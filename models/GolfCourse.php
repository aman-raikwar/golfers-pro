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
                [['Name', 'LoginID', 'Password', 'Email', 'Address1', 'Address2', 'Town', 'PostCode', 'ContactNumber', 'ClubHoles', 'ClubYardage', 'ClubPar', 'GreenFeeFrom', 'GreenFeeTo'], 'required'],
            //['Password', 'string', 'min' => 6, 'max' => 16],
            //['Password_repeat', 'required'],
            //['password_repeat', 'compare', 'compareAttribute'=>'Password', 'skipOnEmpty' => false, 'message'=>"Both Passwords didn't match"],
            //[['Password_repeat'], 'compare', 'compareAttribute' => 'Password'],
            //['Password_repeat', 'compare'],
            //[['Name', 'LoginID', 'Password', 'Email',  'ContactNumber', 'Address1', 'Address2', 'Town', 'PostCode', 'AddressNote', 'ClubDescription', 'ClubUrl', 'ClubHoles', 'ClubYardage', 'ClubPar', 'GpgUrl', 'ClubLogo', 'GreenFeeFrom', 'GreenFeeTo'], 'required'],            
            [['ClubHoles', 'ClubYardage', 'ClubPar', 'GreenFeeFrom', 'GreenFeeTo'], 'integer'],
                [['Name', 'LoginID', 'Password'], 'string', 'max' => 200],
                [['Email', 'ContactNumber', 'Address1', 'Address2', 'Town', 'PostCode', 'AddressNote', 'ClubDescription', 'ClubUrl', 'GpgUrl', 'ClubLogo'], 'string', 'max' => 255],
                [['ClubFacebook', 'ClubTwitter', 'Country', 'County'], 'safe']
        ];
    }

//    
//        public function rules()
//    {
//        return [
//            [['Name', 'LoginID', 'Password', 'IsAdmin', 'Activationkey', 'Email', 'ClubFacebook', 'ClubTwitter', 'ContactNumber', 'Address1', 'Address2', 'Town', 'County', 'Country', 'PostCode', 'AddressNote', 'ClubDescription', 'ClubUrl', 'ClubHoles', 'ClubYardage', 'ClubPar', 'GpgUrl', 'ClubLogo', 'MainImage', 'GreenFeeFrom', 'GreenFeeTo', 'hasDrivingRange', 'hasPracticeGround', 'hasPracticeNet', 'hasPuttingGreen', 'hasSwingStudio', 'hasBuggyHire', 'hasTrolleyHire', 'allowsSociety', 'hasVenueHire', 'hasShowers', 'hasSnooker', 'hasGym', 'hasSwimming', 'hasAccommodation'], 'required'],
//            [['IsAdmin', 'ClubHoles', 'ClubYardage', 'ClubPar', 'GreenFeeFrom', 'GreenFeeTo', 'hasDrivingRange', 'hasPracticeGround', 'hasPracticeNet', 'hasPuttingGreen', 'hasSwingStudio', 'hasBuggyHire', 'hasTrolleyHire', 'allowsSociety', 'hasVenueHire', 'hasShowers', 'hasSnooker', 'hasGym', 'hasSwimming', 'hasAccommodation'], 'integer'],
//            [['Name', 'LoginID', 'Password'], 'string', 'max' => 200],
//            [['Activationkey', 'Email', 'ClubFacebook', 'ClubTwitter', 'ContactNumber', 'Address1', 'Address2', 'Town', 'County', 'Country', 'PostCode', 'AddressNote', 'ClubDescription', 'ClubUrl', 'GpgUrl', 'ClubLogo', 'MainImage'], 'string', 'max' => 255],
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'Name' => 'Golf Club Name',
            'LoginID' => 'Admin Login',
            'Password' => 'Password',
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
//            'hasDrivingRange' => 'Has Driving Range',
//            'hasPracticeGround' => 'Has Practice Ground',
//            'hasPracticeNet' => 'Has Practice Net',
//            'hasPuttingGreen' => 'Has Putting Green',
//            'hasSwingStudio' => 'Has Swing Studio',
//            'hasBuggyHire' => 'Has Buggy Hire',
//            'hasTrolleyHire' => 'Has Trolley Hire',
//            'allowsSociety' => 'Allows Society',
//            'hasVenueHire' => 'Has Venue Hire',
//            'hasShowers' => 'Has Showers',
//            'hasSnooker' => 'Has Snooker',
//            'hasGym' => 'Has Gym',
//            'hasSwimming' => 'Has Swimming',
//            'hasAccommodation' => 'Has Accommodation',
        ];
    }

    public function getAll() {
        return GolfCourse::find()->all();
    }

}
