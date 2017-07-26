<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "playeractivity".
 *
 * @property integer $ID
 * @property string $ReaderID
 * @property string $CardID
 * @property string $Date
 */
class Playeractivity extends \yii\db\ActiveRecord {

    public $club_id;
    public $activity_date;
    public $activity_time;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'playeractivity';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            ['CardID', 'required', 'message' => 'Please select Card Number'],
            ['club_id', 'required', 'message' => 'Please select Check-in to Golf Club '],
            ['ReaderID', 'required', 'message' => 'Please select Card Reader'],
            [['CardID', 'activity_date', 'activity_time'], 'required'],
            [['Date'], 'safe'],
            [['ReaderID', 'CardID'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'ID' => Yii::t('app', 'Unique system reference'),
            'ReaderID' => Yii::t('app', 'Reference ID of the Card Reader, which is the referenced in the reader table to determine which golf club the golfer has checked-in at.'),
            //'CardID' => Yii::t('app', 'The unique Card ID captured during check-in which is then referenced in the Registration Card table to work out which player check-in.'),
            'CardID' => 'Golfer Card Number',
            'Date' => Yii::t('app', 'When the check-in occurred (day and time)'),
        ];
    }

    public function getCard() {
        return $this->hasOne(RegistrationCards::className(), ['CardNumber' => 'CardID']);
    }

    public function getAll() {
        $activities = [];

        if (Yii::$app->user->identity->user_roleID == 2) {
            // Golfer
            $golfer = Golfer::findOne(['golfer_userID' => Yii::$app->user->identity->user_id]);
            if (!empty($golfer)) {
                $card = RegistrationCards::findOne(['UserID' => $golfer->golfer_id]);
                if (!empty($card)) {
                    $activities = Playeractivity::find()->where(['CardID' => $card->CardNumber])->all();
                }
            }
        } else if (Yii::$app->user->identity->user_roleID == 3) {
            // GolfClub
            $club = GolfClub::findOne(['golfclub_userID' => Yii::$app->user->identity->user_id]);
            if (!empty($club)) {
                echo $club->golfclub_id;
                $readers = CardReaders::find()->select('ID')->where(['GolfCourse' => $club->golfclub_id])->all();
                if (!empty($readers)) {
                    $readersList = [];
                    foreach ($readers as $reader) {
                        $readersList[] = $reader->ID;
                    }

                    $activities = Playeractivity::find()->where(['ReaderID' => $readersList])->all();
                }
            }
        } else {
            // Administrator
            $activities = Playeractivity::find()->all();
        }

        return $activities;
    }

}
