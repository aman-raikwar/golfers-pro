<?php

namespace app\models;

use Yii;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "registration_cards".
 *
 * @property integer $ID
 * @property string $CardNumber
 * @property string $UserID
 * @property string $RegisteredDate
 * @property string $ClubID
 */
class RegistrationCards extends ActiveRecord {

    public $firstcard_number;
    public $lastcard_number;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'registration_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['firstcard_number', 'lastcard_number'], 'required'],
            //[['CardNumber', 'UserID', 'RegisteredDate', 'ClubID'], 'required'],
            [['RegisteredDate'], 'safe'],
            [['CardNumber'], 'string', 'max' => 200],
            [['UserID', 'ClubID'], 'integer'],
        ];
    }

//
//    /**
//     * @inheritdoc
//     */
    public function attributeLabels() {
        return [
            'ID' => 'ID',
            'firstcard_number' => 'Top Range',
            'lastcard_number' => 'Bottom Range',
            'CardNumber' => 'Card Number',
            'UserID' => 'User ID',
            'RegisteredDate' => 'Registered',
            'ClubID' => 'Golf Club',
        ];
    }

    public static function getClubName($clubID) {
        $club = GolfClub::findOne(['golfclub_id' => $clubID]);

        if (!empty($club)) {
            return $club->golfclub_name;
        } else {
            return '-';
        }
    }

//    public function getAll($input) {
//        return $query = RegistrationCards::find()->all();
//    }
//
//    public function demoInsert() {
//        $obj = new RegistrationCards();
//        $obj->CardNumber = "1234";
//        $obj->save();
//        print_r($obj);
//        die;
//    }
}
