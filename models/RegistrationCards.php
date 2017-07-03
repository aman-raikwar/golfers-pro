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
class RegistrationCards extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registration_cards';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CardNumber', 'UserID', 'RegisteredDate', 'ClubID'], 'required'],
            [['RegisteredDate'], 'safe'],
            [['CardNumber', 'UserID', 'ClubID'], 'string', 'max' => 200],
        ];
    }
//
//    /**
//     * @inheritdoc
//     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CardNumber' => 'Card Number',
            'UserID' => 'User ID',
            'RegisteredDate' => 'Registered Date',
            'ClubID' => 'Club ID',
        ];
    }
    
    
    public function getAll($input){
      return $query = RegistrationCards::find()->all();
    }
    
    public function demoInsert(){
          $obj = new RegistrationCards();
          $obj->CardNumber = "1234";
          $obj->save();      
          print_r($obj);die;
      }
}
