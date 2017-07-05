<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model {

    public $user_email;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['user_email', 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail() {
        /* @var $user User */
        $user = User::findOne(['status' => User::STATUS_ACTIVE, 'user_email' => $this->user_email]);

        if (!$user) {
            return false;
        }

        if (!User::isPasswordResetTokenValid($user->user_activation_key)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
//                print_r($user->getErrors());
//                echo 'aaa';
//                die;
                return false;
            }
        }

        return Yii::$app
                        ->mailer
                        ->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
                        ->setTo($this->user_email)
                        ->setSubject('Password reset for ' . Yii::$app->name)
                        ->send();
    }

}
