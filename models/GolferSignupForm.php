<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\Golfer;

/**
 * Signup form
 */
class GolferSignupForm extends Model {

    public $user_email;
    public $user_username;
    public $user_password;
    public $user_password_repeat;
    public $golfer_id;
    public $golfer_title;
    public $golfer_firstname;
    public $golfer_lastname;
    public $golfer_gender;
    public $golfer_dateOfBirth;
    public $golfer_address1;
    public $golfer_address2;
    public $golfer_phone;
    public $golfer_town;
    public $golfer_firstClubID;
    public $golfer_isMemberOfAnotherClub;
    public $golfer_otherClubID;
    public $golfer_country;
    public $golfer_county;
    public $golfer_countyCardId;
    public $golfer_countyCardNumber;
    public $golfer_postCode;
    public $golfer_notes;
    public $golfer_lifetimeID;
    public $golfer_optIn;
    public $golfer_opgRegType;
    public $acceptTermsCondition;

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['user_username', 'trim'],
            ['user_username', 'required'],
            ['user_username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            ['user_username', 'string', 'min' => 2, 'max' => 255],
            ['user_email', 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'string', 'max' => 255],
            //['user_email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['user_password', 'required'],
            ['user_password', 'string', 'min' => 6],
            ['user_password_repeat', 'required'],
            ['user_password_repeat', 'compare', 'compareAttribute' => 'user_password'],
            [['golfer_firstClubID', 'golfer_firstname', 'golfer_lastname', 'golfer_country', 'golfer_town', 'golfer_postCode', 'golfer_dateOfBirth'], 'required'],
            [['golfer_firstClubID', 'golfer_country', 'golfer_optIn'], 'integer'],
            ['acceptTermsCondition', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms and Conditions'],
            ['golfer_phone', 'string', 'max' => 12],
            ['golfer_dateOfBirth', 'safe'],
            [['golfer_firstname', 'golfer_lastname', 'golfer_address1', 'golfer_address2', 'golfer_notes'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'user_password' => Yii::t('app', 'Password'),
            'user_password_repeat' => Yii::t('app', 'Repeat Password'),
            'user_email' => Yii::t('app', 'Email'),
            'user_username' => Yii::t('app', 'Username'),
            'golfer_id' => Yii::t('app', 'Golfer ID'),
            'golfer_title' => Yii::t('app', 'Title'),
            'golfer_firstname' => Yii::t('app', 'First Name'),
            'golfer_lastname' => Yii::t('app', 'Last Name'),
            'golfer_gender' => Yii::t('app', 'Gender'),
            'golfer_dateOfBirth' => Yii::t('app', 'Date Of Birth'),
            'golfer_address1' => Yii::t('app', 'Address Line 1'),
            'golfer_address2' => Yii::t('app', 'Address Line 2'),
            'golfer_phone' => Yii::t('app', 'Phone No'),
            'golfer_town' => Yii::t('app', 'Town'),
            'golfer_firstClubID' => Yii::t('app', 'Which golf club they a member of. Can also be \'None\', which we will store in the platform as \'Nomad\' Club'),
            'golfer_isMemberOfAnotherClub' => Yii::t('app', 'Is Member Of Another Club'),
            'golfer_otherClubID' => Yii::t('app', 'Other Club Name'),
            'golfer_country' => Yii::t('app', 'Country'),
            'golfer_county' => Yii::t('app', 'County'),
            'golfer_countyCardId' => Yii::t('app', 'County Card ID'),
            'golfer_countyCardNumber' => Yii::t('app', 'County Card Number'),
            'golfer_postCode' => Yii::t('app', 'Post Code'),
            'golfer_notes' => Yii::t('app', 'Notes'),
            'golfer_lifetimeID' => Yii::t('app', 'Player Lifetime ID'),
            'golfer_optIn' => Yii::t('app', 'Opt In'),
            'golfer_opgRegType' => Yii::t('app', 'This refers to the Golfer Card levels of 1,2,3 etc. For now, just put generic names.'),
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup() {
        if (!$this->validate()) {
            return null;
        }

        try {

            $golfer = new Golfer();
            $golfer->golfer_title = $this->golfer_title;
            $golfer->golfer_firstname = $this->golfer_firstname;
            $golfer->golfer_lastname = $this->golfer_lastname;
            $golfer->golfer_gender = $this->golfer_gender;
            $golfer->golfer_dateOfBirth = $this->golfer_dateOfBirth;
            $golfer->golfer_address1 = $this->golfer_address1;
            $golfer->golfer_address2 = $this->golfer_address2;
            $golfer->golfer_phone = $this->golfer_phone;
            $golfer->golfer_town = $this->golfer_town;
            $golfer->golfer_firstClubID = $this->golfer_firstClubID;
            $golfer->golfer_isMemberOfAnotherClub = $this->golfer_isMemberOfAnotherClub;
            $golfer->golfer_otherClubID = $this->golfer_otherClubID;
            $golfer->golfer_country = $this->golfer_country;
            $golfer->golfer_county = $this->golfer_county;
            $golfer->golfer_countyCardId = $this->golfer_countyCardId;
            $golfer->golfer_countyCardNumber = $this->golfer_countyCardNumber;
            $golfer->golfer_postCode = $this->golfer_postCode;
            $golfer->golfer_notes = $this->golfer_notes;
            $golfer->golfer_lifetimeID = $this->golfer_lifetimeID;
            $golfer->golfer_optIn = $this->golfer_optIn;
            $golfer->golfer_opgRegType = $this->golfer_opgRegType;
            $golfer->user_username = $this->user_username;
            $golfer->user_email = $this->user_email;
            $golfer->acceptTermsCondition = $this->acceptTermsCondition;

            $user = new User();
            $user->user_username = $this->user_username;
            $user->user_email = $this->user_email;
            $user->setPassword($this->user_password);
            $user->generateAuthKey();
            $user->user_roleID = 2;
            $user->user_userID = 0;


            if ($user->save()) {
                $golfer->golfer_userID = $user->user_id;
                return $user->save() ? $user : null;
            } else {
                echo '<pre>';
                print_r($golfer->getErrors());
                print_r($user->getErrors());
                die();
            }
        } catch (\yii\db\Exception $e) {
            return null;
        }
    }

}
