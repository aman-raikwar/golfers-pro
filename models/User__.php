<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "player".
 *
 * @property integer $ID
 * @property integer $FirstClubID
 * @property string $FirstName
 * @property string $LastName
 * @property string $DateOfBirth
 * @property string $Email
 * @property string $Address
 * @property string $RegisterationKey
 * @property string $Password
 * @property integer $isRegistered
 * @property string $PhoneNo
 * @property string $Title
 * @property string $IsMemberOfAnotherClub
 * @property string $OtherClubName
 * @property string $Gender
 * @property string $Address2
 * @property string $Town
 * @property string $County
 * @property integer $Country
 * @property string $CountyCardId
 * @property string $CountyCardNumber
 * @property string $PostCode
 * @property string $Notes
 * @property string $player_lifetime_id
 * @property integer $optIn
 * @property string $activation_key
 * @property string $on_date
 * @property string $OpgRegType
 * @property string $auth_key
 */
 
class User extends ActiveRecord implements IdentityInterface {

    /**
     * @inheritdoc
     */
    public $PasswordConfirm;
    public $acceptTermsCondition;
    
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 1;
    
    public static function tableName() {
        return 'player';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['FirstClubID', 'FirstName', 'LastName', 'password', 'Email', 'Country', 'Town', 'PostCode', 'DateOfBirth'], 'required'],
                [['FirstClubID', 'isRegistered', 'Country', 'optIn'], 'integer'],
                ['PasswordConfirm', 'compare', 'compareAttribute' => 'password'],
                ['PasswordConfirm', 'required', 'on' => 'register'],
                ['acceptTermsCondition', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms and Conditions', 'on' => 'register'],
                ['password', 'safe'],
                ['Email', 'email'],
                ['Email', 'unique'],
                ['PhoneNo', 'string', 'max' => 12],
                //  ['PhoneNo','application.extensions.UKPhoneValidator'],
                [['DateOfBirth', 'on_date'], 'safe'],
                // ['DateOfBirth', 'type' =>'date', 'message' => '{attribute}: is not a date!',  'dateFormat' => 'yyyy-MM-dd'],
                [['FirstName', 'LastName', 'Email', 'Address', 'password', 'Address2', 'Notes'], 'string', 'max' => 200],
                [['RegisterationKey', 'PhoneNo', 'Title', 'IsMemberOfAnotherClub', 'OtherClubName', 'Gender', 'Town', 'County', 'CountyCardId', 'CountyCardNumber', 'PostCode', 'OpgRegType'], 'string', 'max' => 100],
                [['player_lifetime_id'], 'string', 'max' => 256],
                [['activation_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FirstClubID' => Yii::t('app', 'Which Golf Club are you a member of?'),
            'FirstName' => Yii::t('app', 'First Name'),
            'LastName' => Yii::t('app', 'Last Name'),
            'DateOfBirth' => Yii::t('app', 'Date Of Birth'),
            'Email' => Yii::t('app', 'Email'),
            'Address' => Yii::t('app', 'Address'),
            'RegisterationKey' => Yii::t('app', 'Registeration Key'),
            'password' => Yii::t('app', 'Password'),
            'PasswordConfirm' => Yii::t('app', 'Confirm Password'),
            'isRegistered' => Yii::t('app', 'Is Registered'),
            'PhoneNo' => Yii::t('app', 'Phone No'),
            'Title' => Yii::t('app', 'Title'),
            'IsMemberOfAnotherClub' => Yii::t('app', 'Member of another Club?'),
            'OtherClubName' => Yii::t('app', 'Other Club Name'),
            'Gender' => Yii::t('app', 'Gender'),
            'Address2' => Yii::t('app', 'Address2'),
            'Town' => Yii::t('app', 'Town'),
            'County' => Yii::t('app', 'County'),
            'Country' => Yii::t('app', 'Country'),
            'CountyCardId' => Yii::t('app', 'County Card ID'),
            'CountyCardNumber' => Yii::t('app', 'County Card Number'),
            'PostCode' => Yii::t('app', 'Post Code'),
            'Notes' => Yii::t('app', 'Notes'),
            'player_lifetime_id' => Yii::t('app', 'Player Lifetime ID'),
            'optIn' => Yii::t('app', 'Opt In'),
            'activation_key' => Yii::t('app', 'Activation Key'),
            'on_date' => Yii::t('app', 'On Date'),
            'OpgRegType' => Yii::t('app', 'This refers to the Golfer Card levels of 1,2,3 etc. For now, just put generic names.'),
                //'acceptTermsCondition' => Yii::t('app', 'Accept Terms and Conditions'),
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {  
        return static::findOne(['Email' => $username]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
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
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {        
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->activation_key = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            
            $this->setPassword($this->password);
            $this->generateAuthKey();
    
            return true;
        } else {
            return false;
        }
    }

}
