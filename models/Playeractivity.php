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
class Playeractivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'playeractivity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ReaderID', 'CardID', 'Date'], 'required'],
            [['Date'], 'safe'],
            [['ReaderID', 'CardID'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'Unique system reference'),
            'ReaderID' => Yii::t('app', 'Reference ID of the Card Reader, which is the referenced in the reader table to determine which golf club the golfer has checked-in at.'),
            'CardID' => Yii::t('app', 'The unique Card ID captured during check-in which is then referenced in the Registration Card table to work out which player check-in.'),
            'Date' => Yii::t('app', 'When the check-in occurred (day and time)'),
        ];
    }
    
    
    public function getAll(){
        return Playeractivity::find()->all();
    }
}
