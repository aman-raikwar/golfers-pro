<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "tbl_users".
 *
 * @property integer $user_id
 * @property string $user_username
 * @property string $user_email
 * @property string $user_password
 * @property string $user_activation_key
 * @property string $user_auth_key
 * @property integer $user_roleID
 * @property string $created
 * @property string $updated
 * @property integer $status
 *
 * @property Roles $userRole
 */
class User extends ActiveRecord implements IdentityInterface {

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_users';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'timestamp' => [
                'class' => '\yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new \yii\db\Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_username', 'user_email', 'user_password', 'user_roleID'], 'required'],
            [['user_roleID', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_username', 'user_email', 'user_password', 'user_activation_key', 'user_auth_key'], 'string', 'max' => 255],
            [['user_username'], 'unique'],
            [['user_email'], 'unique'],
            [['user_roleID'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['user_roleID' => 'role_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_id' => Yii::t('app', 'User ID'),
            'user_username' => Yii::t('app', 'User Username'),
            'user_email' => Yii::t('app', 'User Email'),
            'user_password' => Yii::t('app', 'User Password'),
            'user_activation_key' => Yii::t('app', 'User Activation Key'),
            'user_auth_key' => Yii::t('app', 'User Auth Key'),
            'user_roleID' => Yii::t('app', 'User Role ID'),
            'created' => Yii::t('app', 'Created'),
            'updated' => Yii::t('app', 'Updated'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserRole() {
        return $this->hasOne(Roles::className(), ['role_id' => 'user_roleID']);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id) {
        return static::findOne(['user_id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null) {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username) {
        return static::findOne(['user_username' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token) {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne(['password_reset_token' => $token]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token) {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        //$expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $expire = 24 * 60 * 60;
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId() {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey() {
        return $this->user_auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password) {
        return Yii::$app->security->validatePassword($password, $this->user_password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->user_password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey() {
        $this->user_auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken() {
        $this->user_activation_key = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken() {
        $this->password_reset_token = null;
    }

//    public function beforeSave($insert) {
//        if (parent::beforeSave($insert)) {
//
//            $this->setPassword($this->password);
//            $this->generateAuthKey();
//
//            return true;
//        } else {
//            return false;
//        }
//    }
}
