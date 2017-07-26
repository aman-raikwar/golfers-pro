<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_golfclub".
 *
 * @property integer $golfclub_id
 * @property string $golfclub_name
 * @property string $golfclub_facebookUrl
 * @property string $golfclub_twitterUrl
 * @property string $golfclub_phone
 * @property string $golfclub_address1
 * @property string $golfclub_address2
 * @property string $golfclub_town
 * @property integer $golfclub_countryID
 * @property integer $golfclub_countyID
 * @property string $golfclub_postCode
 * @property string $golfclub_addressNotes
 * @property string $golfclub_description
 * @property string $golfclub_websiteUrl
 * @property integer $golfclub_holes
 * @property integer $golfclub_yardage
 * @property integer $golfclub_par
 * @property string $golfclub_gpgUrl
 * @property string $golfclub_logo
 * @property integer $golfclub_greenFeeFrom
 * @property integer $golfclub_greenFeeTo
 * @property string $golfclub_facilities
 * @property integer $golfclub_userID
 *
 * @property User $golfclubUser
 */
class GolfClub extends \yii\db\ActiveRecord {

    public $user_email;
    public $user_username;
    public $user_password;
    public $user_password_repeat;
    public $new_password;
    public $confirm_new_password;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'tbl_golfclub';
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
                    if (empty($model->golfclub_userID)) {
                        return true;
                    } else {
                        $userNewModel = \app\models\User::find()->where(['user_username' => $model->{$attribute}])->andWhere(['<>', 'user_id', $model->golfclub_userID])->one();

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
            ['user_password', 'required', 'on' => 'create'],
            ['user_password', 'string', 'min' => 6],
            ['user_password_repeat', 'required', 'on' => 'create'],
            ['user_password_repeat', 'validatePassword'],
            //['user_password_repeat', 'compare', 'compareAttribute' => 'user_password'],
            ///['user_password_repeat', 'compare', 'compareAttribute' => 'user_password', 'skipOnEmpty' => false, 'on' => 'create'],
            [['golfclub_name', 'golfclub_town', 'golfclub_countryID', 'golfclub_websiteUrl', 'golfclub_holes', 'golfclub_yardage', 'golfclub_par', 'golfclub_greenFeeFrom', 'golfclub_greenFeeTo'], 'required'],
            [['golfclub_countryID', 'golfclub_countyID', 'golfclub_holes', 'golfclub_yardage', 'golfclub_par', 'golfclub_greenFeeFrom', 'golfclub_greenFeeTo'], 'integer'],
            [['golfclub_name', 'golfclub_facebookUrl', 'golfclub_twitterUrl', 'golfclub_address1', 'golfclub_address2', 'golfclub_town', 'golfclub_websiteUrl', 'golfclub_gpgUrl', 'golfclub_logo'], 'string', 'max' => 255],
            [['golfclub_phone'], 'string', 'max' => 50],
            [['golfclub_postCode'], 'string', 'max' => 100],
            [['golfclub_addressNotes'], 'string', 'max' => 300],
            //[['golfclub_description'], 'string', 'message' => 'Please enter a description of the Club upto 250 words.'],
            ['golfclub_description', 'validateDescription'],
            //[['golfclub_facebookUrl', 'golfclub_twitterUrl', 'golfclub_websiteUrl', 'golfclub_gpgUrl'], 'url'],
            [['golfclub_websiteUrl', 'golfclub_gpgUrl'], 'url'],
            [['golfclub_userID'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['golfclub_userID' => 'user_id']],
            [['new_password', 'confirm_new_password'], 'required', 'on' => 'changepassword'],
            ['confirm_new_password', 'validateConfirmPassword'],
        ];
    }

    public function validatePassword($attribute, $params) {
        if ($this->user_password != $this->user_password_repeat) {
            $this->addError($attribute, 'Both Password didn\'t match.');
        }
    }

    public function validateDescription($attribute, $params) {
        if (!empty($this->golfclub_description)) {
            $num = str_word_count($this->golfclub_description);
            if ($num > 250) {
                $this->addError($attribute, 'Please enter a description of the Club upto 250 words.');
            }
        }
    }

    public function validateConfirmPassword($attribute, $params) {
        if ($this->new_password != $this->confirm_new_password) {
            $this->addError($attribute, 'Both Password didn\'t match.');
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
            'golfclub_id' => Yii::t('app', 'Club Number'),
            'golfclub_name' => Yii::t('app', 'Golf Club Name'),
            'golfclub_facebookUrl' => Yii::t('app', 'Club Facebook URL'),
            'golfclub_twitterUrl' => Yii::t('app', 'Club Twitter URL'),
            'golfclub_phone' => Yii::t('app', 'Contact Number'),
            'golfclub_address1' => Yii::t('app', 'Address Line 1'),
            'golfclub_address2' => Yii::t('app', 'Address Line 2'),
            'golfclub_town' => Yii::t('app', 'Town'),
            'golfclub_countryID' => Yii::t('app', 'Country'),
            'golfclub_countyID' => Yii::t('app', 'County'),
            'golfclub_postCode' => Yii::t('app', 'Post Code'),
            'golfclub_addressNotes' => Yii::t('app', 'Address Notes'),
            'golfclub_description' => Yii::t('app', 'Club Description'),
            'golfclub_websiteUrl' => Yii::t('app', 'Club Website URL'),
            'golfclub_holes' => Yii::t('app', 'Number of Holes'),
            'golfclub_yardage' => Yii::t('app', 'Total Yardage'),
            'golfclub_par' => Yii::t('app', 'Course Par'),
            'golfclub_gpgUrl' => Yii::t('app', 'Club GPG URL'),
            'golfclub_logo' => Yii::t('app', 'Club Logo'),
            'golfclub_greenFeeFrom' => Yii::t('app', 'Green Fee From (£)'),
            'golfclub_greenFeeTo' => Yii::t('app', 'Green Fee To (£)'),
            'golfclub_facilities' => Yii::t('app', 'Club Facilities'),
            'golfclub_userID' => Yii::t('app', 'Golf Club User ID'),
            'new_password' => Yii::t('app', 'New Password'),
            'confirm_new_password' => Yii::t('app', 'Confirm New Password'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['user_id' => 'golfclub_userID']);
    }

    public static function getGolfClubName($club_id) {
        $club = GolfClub::findOne(['golfclub_id' => $club_id]);
        if (!empty($club)) {
            return $club->golfclub_name;
        } else {
            return '';
        }
    }

    public static function getCountOfGolfers($golfclub_id) {
        return Golfer::find()->andWhere(['OR', ['golfer_firstClubID' => $golfclub_id], ['golfer_otherClubID' => $golfclub_id]])->count();
    }

    public static function getCheckInsCount($golfclub_id = null) {
        if (!empty($golfclub_id)) {
            $readers = CardReaders::findAll(['GolfCourse' => $golfclub_id]);
        } else {
            $readers = CardReaders::find()->all();
        }

        $totalCount = 0;

        if (!empty($readers)) {
            foreach ($readers as $reader) {
                $activity = Playeractivity::find()->where(['ReaderID' => $reader->ID])->count();
                $totalCount += $activity;
            }
        }

        return $totalCount;
    }

}
