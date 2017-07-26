<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_golfer".
 *
 * @property integer $golfer_id
 * @property string $golfer_title
 * @property string $golfer_firstname
 * @property string $golfer_lastname
 * @property string $golfer_gender
 * @property string $golfer_dateOfBirth
 * @property string $golfer_address1
 * @property string $golfer_address2
 * @property string $golfer_phone
 * @property string $golfer_town
 * @property integer $golfer_firstClubID
 * @property string $golfer_isMemberOfAnotherClub
 * @property string $golfer_otherClubID
 * @property integer $golfer_country
 * @property string $golfer_county
 * @property string $golfer_countyCardId
 * @property string $golfer_countyCardNumber
 * @property string $golfer_postCode
 * @property string $golfer_notes
 * @property string $golfer_lifetimeID
 * @property integer $golfer_optIn
 * @property string $golfer_opgRegType
 * @property integer $golfer_userID
 */
class Golfer extends \yii\db\ActiveRecord {

    public $user_email;
    public $user_username;
    public $user_password;
    public $user_password_repeat;
    public $acceptTermsCondition;
    public $golfer_card_number;
    public $new_password;
    public $confirm_new_password;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_golfer';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['user_username', 'trim'],
            ['user_username', 'required'],
            //['user_username', 'unique', 'targetClass' => User::className(), 'message' => 'This username has already been taken.'],
            [
                'user_username',
                'unique',
                'targetClass' => User::className(),
                'message' => 'This username has already been taken.',
                'when' => function ($model, $attribute) {
                    if (empty($model->golfer_userID)) {
                        return true;
                    } else {
                        $userNewModel = \app\models\User::find()->where(['user_username' => $model->{$attribute}])->andWhere(['<>', 'user_id', $model->golfer_userID])->one();

                        if (empty($userNewModel)) {
                            return false;
                        } else {
                            return true;
                        }
                    }
                }
            ],
            ['golfer_isMemberOfAnotherClub', 'validateOtherClub'],
            ['golfer_phone', 'validateUser'],
            ['user_username', 'string', 'min' => 2, 'max' => 255],
            ['user_email', 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'string', 'max' => 255],
            //['user_email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['user_password', 'required', 'on' => ['register', 'create']],
            ['golfer_card_number', 'required', 'on' => ['create', 'update']],
            ['user_password', 'string', 'min' => 6],
            ['user_password_repeat', 'required', 'on' => 'create'],
            //['user_password_repeat', 'compare', 'compareAttribute' => 'user_password'],
            ['user_password_repeat', 'compare', 'compareAttribute' => 'user_password', 'skipOnEmpty' => false],
            ['golfer_firstClubID', 'required', 'message' => 'Please select Golf Club'],
            [['golfer_firstname', 'golfer_lastname', 'golfer_country', 'golfer_town', 'golfer_postCode', 'golfer_dateOfBirth'], 'required'],
            [['golfer_firstClubID', 'golfer_country', 'golfer_optIn'], 'integer'],
            ['acceptTermsCondition', 'required', 'requiredValue' => 1, 'message' => 'Please accept Terms and Conditions'],
            ['golfer_phone', 'string', 'max' => 12],
            [['golfer_firstname', 'golfer_lastname', 'golfer_address1', 'golfer_address2', 'golfer_notes'], 'string', 'max' => 200],
            [['golfer_dateOfBirth', 'golfer_opgregtype', 'golfer_isMemberOfAnotherClub', 'golfer_otherClubID', 'golfer_title', 'golfer_gender', 'golfer_county'], 'safe'],
            [['new_password', 'confirm_new_password'], 'required', 'on' => 'changepassword'],
            ['confirm_new_password', 'validateConfirmPassword'],
        ];
    }

    public function validateConfirmPassword($attribute, $params) {
        if ($this->new_password != $this->confirm_new_password) {
            $this->addError($attribute, 'Both Password didn\'t match.');
        }
    }

    public function validateOtherClub($attribute, $params) {
        if (!empty($this->golfer_isMemberOfAnotherClub)) {
            if ($this->golfer_isMemberOfAnotherClub == 2) {
                if ($this->golfer_otherClubID == '') {
                    $this->addError('golfer_otherClubID', 'Please select Other Club');
                }
            }
        }
    }

    public function validateUser($attribute, $params) {
        if (!empty($this->golfer_firstname) && !empty($this->golfer_lastname) && !empty($this->golfer_phone)) {
            if ($this->isNewRecord) {
                $userNewModel = Golfer::find()->where([
                            'golfer_firstname' => $this->golfer_firstname,
                            'golfer_lastname' => $this->golfer_lastname,
                            'golfer_phone' => $this->golfer_phone
                        ])->one();
            } else {
                $userNewModel = Golfer::find()->where([
                            'golfer_firstname' => $this->golfer_firstname,
                            'golfer_lastname' => $this->golfer_lastname,
                            'golfer_phone' => $this->golfer_phone
                        ])->andWhere(['<>', 'golfer_id', $this->golfer_id])->one();
            }

            if (!empty($userNewModel)) {
                $this->addError($attribute, 'An account already exists with Same First Name, Last Name and Phone Number');
            }
        }
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
            'golfer_dateOfBirth' => Yii::t('app', 'Date of Birth'),
            'golfer_address1' => Yii::t('app', 'Address Line 1'),
            'golfer_address2' => Yii::t('app', 'Address Line 2'),
            'golfer_phone' => Yii::t('app', 'Phone No'),
            'golfer_town' => Yii::t('app', 'Town'),
            'golfer_firstClubID' => Yii::t('app', 'Which Golf Club are you a member of?'),
            'golfer_isMemberOfAnotherClub' => Yii::t('app', 'Member of another Club'),
            'golfer_otherClubID' => Yii::t('app', 'Select Golf Club'),
            'golfer_country' => Yii::t('app', 'Country'),
            'golfer_county' => Yii::t('app', 'County'),
            'golfer_countyCardId' => Yii::t('app', 'County Card ID'),
            'golfer_countyCardNumber' => Yii::t('app', 'County Card Number'),
            'golfer_postCode' => Yii::t('app', 'Post Code'),
            'golfer_notes' => Yii::t('app', 'Notes'),
            'golfer_lifetimeID' => Yii::t('app', 'Player Lifetime ID'),
            'golfer_optIn' => Yii::t('app', 'Opt In'),
            'golfer_opgRegType' => Yii::t('app', 'Golfer Card Membership Category'),
            'golfer_userID' => Yii::t('app', 'Golfer User ID'),
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['user_id' => 'golfer_userID']);
    }

    public static function getGolferName($golfer_id) {
        $golfer = Golfer::findOne(['golfer_id' => $golfer_id]);
        if (!empty($golfer)) {
            return $golfer->golfer_firstname . ' ' . $golfer->golfer_lastname;
        } else {
            return '';
        }
    }

}
