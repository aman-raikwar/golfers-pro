<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model {

    public $username;
    public $password;
    public $rememberMe = true;
    private $_user;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            //['email', 'email'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params) {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError($attribute, 'Incorrect Username.');
            }

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect Password.');
            }

            if (!$user || !$user->status == 1) {
                $this->addError($attribute, 'Please verify your Email Address. Check your Inbox for the Email.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login() {
        if ($this->validate()) {

            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie(['name' => 'rememberMe', 'value' => $this->rememberMe]));
            if ($this->rememberMe == 1) {
                $cookies->add(new \yii\web\Cookie(['name' => 'username', 'value' => $this->username]));
                $cookies->add(new \yii\web\Cookie(['name' => 'password', 'value' => $this->password]));
            } else {
                $cookies->remove('username');
                unset($cookies['username']);
                $cookies->remove('password');
                unset($cookies['password']);
            }

            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser() {
        if ($this->_user === null) {
            $this->_user = User::findByUsername(strtolower($this->username));
        }

        return $this->_user;
    }

}
