<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model {

    public $request_type;
    public $user_email;
    public $user_username;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['request_type', 'required', 'message' => 'Please accept Terms and Conditions'],
            ['request_type', 'request_type_validator'],
            ['user_email', 'trim'],
            //['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
            ['user_username', 'trim'],
//            ['user_email', 'required'],
            //['user_email', 'email'],
            ['user_username', 'exist',
                'targetClass' => '\app\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such Username.'
            ],
        ];
    }

    public function request_type_validator($attribute, $params) {
        if ($this->request_type == 1) {
            if (empty($this->user_email)) {
                $this->addError('user_email', 'Email Address is required');
            }
        } else {
            if (empty($this->user_username)) {
                $this->addError('user_username', 'Username is required');
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_email' => Yii::t('app', 'Email Address'),
            'user_username' => Yii::t('app', 'Username')
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail($selectUser) {
        /* @var $user User */
        if ($this->request_type == 1) {
            if ($selectUser > 0) {
                $user = User::findOne(['status' => User::STATUS_ACTIVE, 'user_id' => $selectUser]);
            } else {
                $user = User::findOne(['status' => User::STATUS_ACTIVE, 'user_email' => $this->user_email]);
            }
        } else {
            $user = User::findOne(['status' => User::STATUS_ACTIVE, 'user_username' => $this->user_username]);
        }

        if (!$user) {
            return false;
        }

        if (!User::isPasswordResetTokenValid($user->user_activation_key)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
                        ->mailer
                        ->compose(['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'], ['user' => $user])
                        ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name])
                        ->setTo($user->user_email)
                        ->setSubject('Password reset for ' . Yii::$app->name)
                        ->send();
    }

}
