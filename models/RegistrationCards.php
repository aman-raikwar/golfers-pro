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
            [['ClubID', 'firstcard_number'], 'required'],
            [['firstcard_number', 'lastcard_number'], 'string', 'min' => 11, 'max' => 11],
            //[['CardNumber', 'UserID', 'RegisteredDate', 'ClubID'], 'required'],
            [
                'lastcard_number',
                'required',
                'when' => function ($model, $attribute) {
                    $firstcard_number = $model->firstcard_number;
                    $lastcard_number = $model->lastcard_number;

                    $card1 = substr($firstcard_number, 0, 3);
                    $card2 = substr($lastcard_number, 0, 3);

                    $card11 = substr($firstcard_number, 3);
                    //var_dump(ctype_digit($card11));
                    $card22 = substr($lastcard_number, 3);
                    //var_dump(ctype_digit($card22));
                    //die;

                    if ($card1 != $card2) {
                        $this->addError($attribute, 'Top range and Bottom range should have first three characters same.');
                        return FALSE;
                    } else {
                        if (!ctype_digit($card11) && !ctype_digit($card22)) {
                            $this->addError($attribute, 'Top range and Bottom range should have this format for cards, LLLNNNNNNNN.');
                            return FALSE;
                        } else {
                            $min = filter_var($firstcard_number, FILTER_SANITIZE_NUMBER_INT);
                            $max = filter_var($lastcard_number, FILTER_SANITIZE_NUMBER_INT);
                            if (empty($min) || empty($max)) {
                                $this->addError($attribute, 'Enter correct card format.');
                                return FALSE;
                            } else if ($max < $min) {
                                $this->addError($attribute, 'Top range should be less than bottom range');
                                return FALSE;
                            } else {
                                return TRUE;
                            }
                        }
                    }
                }
            ],
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

    public function getAll() {
        if (Yii::$app->user->identity->user_roleID == 3) {
            $user_id = Yii::$app->user->identity->user_id;
            $club = GolfClub::findOne(['golfclub_userID' => $user_id]);
            if (!empty($club)) {
                $response = RegistrationCards::find()->where(['ClubID' => $club->golfclub_id])->all();
            } else {
                $response = RegistrationCards::find()->where(['ClubID' => 0])->all();
            }
        } else {
            $response = RegistrationCards::find()->all();
        }

        return $response;
    }

//
//    public function demoInsert() {
//        $obj = new RegistrationCards();
//        $obj->CardNumber = "1234";
//        $obj->save();
//        print_r($obj);
//        die;
//    }
}
