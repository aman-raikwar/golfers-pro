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
            ['user_username', 'string', 'min' => 2, 'max' => 255],
            ['user_email', 'trim'],
            ['user_email', 'required'],
            ['user_email', 'email'],
            ['user_email', 'string', 'max' => 255],
            //['user_email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],
            ['user_password', 'required', 'on' => ['register', 'create']],
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
            'golfer_firstClubID' => Yii::t('app', 'Which Golf Club are you a member of?'),
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
            'golfer_opgRegType' => Yii::t('app', 'Golfer Card Membership Category'),
            'golfer_userID' => Yii::t('app', 'Golfer User ID'),
        ];
    }

    public function getUser() {
        return $this->hasOne(User::className(), ['user_id' => 'golfer_userID']);
    }

    public static function getGolfClubName($golfclub_id) {
        $club = GolfClub::findOne($golfclub_id);
        return $club ? $club->golfclub_name : '';
    }

}
