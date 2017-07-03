<?php

namespace app\models;

use Yii;
use yii\base\Security;

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
 * @property string $PasswordConfirm
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
 */
class GolferRegitration extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public $PasswordConfirm;
    public $acceptTermsCondition;

    public static function tableName() {
        return 'player';
    }

    /**
     * @inheritdoc
     */
//    public function rules()
//    {
//        return [
//            [['FirstClubID', 'FirstName', 'LastName', 'DateOfBirth', 'Email', 'password_hash', 'CountyCardId', 'CountyCardNumber', 'player_lifetime_id', 'optIn', 'OpgRegType'], 'required'],
//            [['FirstClubID', 'isRegistered', 'Country', 'optIn'], 'integer'],
//            [['DateOfBirth', 'on_date'], 'safe'],
//            [['FirstName', 'LastName', 'Email', 'Address', 'password_hash', 'Address2', 'Notes'], 'string', 'max' => 200],
//            [['RegisterationKey', 'PhoneNo', 'Title', 'IsMemberOfAnotherClub', 'OtherClubName', 'Gender', 'Town', 'County', 'CountyCardId', 'CountyCardNumber', 'PostCode', 'OpgRegType'], 'string', 'max' => 100],
//            [['player_lifetime_id'], 'string', 'max' => 256],
//            [['activation_key'], 'string', 'max' => 255],
//        ];
//    }
    public function rules() {
        return [
                [['FirstClubID', 'FirstName', 'LastName', 'password_hash', 'PasswordConfirm', 'Email', 'password_hash', 'Country', 'Town', 'PostCode', 'DateOfBirth'], 'required'],
                ['acceptTermsCondition', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms and Conditions'],
                [['FirstClubID', 'isRegistered', 'Country', 'optIn'], 'integer'],
                ['PasswordConfirm', 'compare', 'compareAttribute' => 'password_hash'],
                ['password_hash', 'safe'],
                ['Email', 'email'],
                ['Email', 'unique'],
                ['PhoneNo', 'string', 'max' => 12],
            //  ['PhoneNo','application.extensions.UKPhoneValidator'],
            [['DateOfBirth', 'on_date'], 'safe'],
            // ['DateOfBirth', 'type' =>'date', 'message' => '{attribute}: is not a date!',  'dateFormat' => 'yyyy-MM-dd'],
            [['FirstName', 'LastName', 'Email', 'Address', 'password_hash', 'Address2', 'Notes'], 'string', 'max' => 200],
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
            'password_hash' => Yii::t('app', 'Password'),
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

    function getAll() {
        return $this->find()->All();
    }

    public function validatePassword($password) {
        return Security::validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password) {
        $this->Password = Yii::$app->getSecurity()->generatePasswordHash($password);
    }

    public function generateAuthKey() {
        $this->RegisterationKey = Security::generateRandomKey();
    }

    public function beforeSave($insert) {
        if (isset($this->Password))
            $this->password_hash = Security::generatePasswordHash($this->Password);
        return parent::beforeSave($insert);
    }

}
