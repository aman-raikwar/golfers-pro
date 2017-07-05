<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "golfcourse".
 *
 * @property integer $ID
 * @property string $Name
 * @property string $LoginID
 * @property string $Password
 * @property integer $IsAdmin
 * @property string $Activationkey
 * @property string $Email
 * @property string $ClubFacebook
 * @property string $ClubTwitter
 * @property string $ContactNumber
 * @property string $Address1
 * @property string $Address2
 * @property string $Town
 * @property string $County
 * @property string $Country
 * @property string $PostCode
 * @property string $AddressNote
 * @property string $ClubDescription
 * @property string $ClubUrl
 * @property integer $ClubHoles
 * @property integer $ClubYardage
 * @property integer $ClubPar
 * @property string $GpgUrl
 * @property string $ClubLogo
 * @property string $MainImage
 * @property integer $GreenFeeFrom
 * @property integer $GreenFeeTo
 * @property integer $hasDrivingRange
 * @property integer $hasPracticeGround
 * @property integer $hasPracticeNet
 * @property integer $hasPuttingGreen
 * @property integer $hasSwingStudio
 * @property integer $hasBuggyHire
 * @property integer $hasTrolleyHire
 * @property integer $allowsSociety
 * @property integer $hasVenueHire
 * @property integer $hasShowers
 * @property integer $hasSnooker
 * @property integer $hasGym
 * @property integer $hasSwimming
 * @property integer $hasAccommodation
 * @property string $ClubFacilities
 */
class GolfCourse extends \yii\db\ActiveRecord {

    public $Password_repeat;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'golfcourse';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Name', 'LoginID', 'Email', 'Address1', 'Country', 'Town', 'ContactNumber', 'ClubUrl', 'ClubHoles', 'ClubYardage', 'ClubPar', 'GreenFeeFrom', 'GreenFeeTo'], 'required'],
            ['Password', 'required', 'on' => 'create'],
            ['Password', 'string', 'min' => 6],
            ['Password_repeat', 'required', 'on' => 'create'],
            ['Password_repeat', 'validatePassword'],
            ['Email', 'email'],
            //[['ClubLogo'], 'file', 'extensions' => 'svg, png, jpg, jpeg, gif'],
            //['ClubLogo', 'image', 'minWidth' => 500, 'maxWidth' => 500, 'minHeight' => 500, 'maxHeight' => 500, 'extensions' => 'jpg, gif, png', 'maxSize' => 1024 * 1024 * 2],
            //['ClubLogo', 'required', 'on' => 'create'],
            ['ClubLogo', 'image', 'minWidth' => 300, 'maxWidth' => 500, 'minHeight' => 300, 'maxHeight' => 500, 'extensions' => 'jpg, jpeg, gif, png', 'maxSize' => 1024 * 1024 * 2, 'on' => 'create'],
            [['ClubUrl', 'GpgUrl', 'ClubFacebook', 'ClubTwitter'], 'url'],
            [['ClubHoles', 'ClubYardage', 'ClubPar', 'GreenFeeFrom', 'GreenFeeTo'], 'integer'],
            [['Name', 'LoginID', 'Password'], 'string', 'max' => 200],
            [['Email', 'ContactNumber', 'Address1', 'Address2', 'Town', 'PostCode', 'AddressNote', 'ClubDescription', 'ClubUrl', 'GpgUrl'], 'string', 'max' => 255],
            [['ClubFacebook', 'ClubTwitter', 'Country', 'County'], 'safe']
        ];
    }

    public function validatePassword($attribute, $params) {
        if ($this->Password != $this->Password_repeat) {
            $this->addError($attribute, 'Both Password didn\'t match.');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'Name' => 'Name',
            'LoginID' => 'Admin Username',
            'Password' => 'Password',
            'Password_repeat' => 'Confirm Password',
            'IsAdmin' => 'Is Admin',
            'Activationkey' => 'Activationkey',
            'Email' => 'Email Address',
            'ClubFacebook' => 'Club Facebook URL',
            'ClubTwitter' => 'Club Twitter URL',
            'ContactNumber' => 'Club Contact Number',
            'Address1' => 'Address Line 1',
            'Address2' => 'Address Line 2',
            'Town' => 'Town',
            'County' => 'County',
            'Country' => 'Country',
            'PostCode' => 'Postcode',
            'AddressNote' => 'Address Note',
            'ClubDescription' => 'Club Description',
            'ClubUrl' => 'Club Website URL',
            'ClubHoles' => 'Number of Holes',
            'ClubYardage' => 'Total Yardage',
            'ClubPar' => 'Course Par',
            'GpgUrl' => 'Club GPG URL',
            'ClubLogo' => 'Club Logo',
            'MainImage' => 'Main Image',
            'GreenFeeFrom' => 'Green Fee From (£)',
            'GreenFeeTo' => 'Green Fee To (£)',
        ];
    }

    public function getAll() {
        return GolfCourse::find()->all();
    }

}
