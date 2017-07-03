<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "card_readers".
 *
 * @property integer $ID
 * @property string $ReaderName
 * @property string $GolfCourse
 */
class CardReaders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_readers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ReaderName', 'GolfCourse'], 'required'],
            [['ReaderName', 'GolfCourse'], 'string', 'max' => 200],
            [['ReaderName'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'Unique system reference'),
            'ReaderName' => Yii::t('app', 'The unique number of the physical reader'),
            'GolfCourse' => Yii::t('app', 'The ID of the Golf Course associated with this reader'),
        ];
    }
}
