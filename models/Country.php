<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "country".
 *
 * @property integer $id
 * @property string $code
 * @property string $dialing_code
 * @property string $short_name
 * @property string $long_name
 * @property integer $is_active
 * @property string $nationality
 */
class Country extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'dialing_code', 'short_name', 'long_name', 'is_active'], 'required'],
            [['is_active'], 'integer'],
            [['code', 'dialing_code'], 'string', 'max' => 2],
            [['short_name', 'long_name'], 'string', 'max' => 128],
            [['nationality'], 'string', 'max' => 50],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'dialing_code' => Yii::t('app', 'Dialing Code'),
            'short_name' => Yii::t('app', 'Short Name'),
            'long_name' => Yii::t('app', 'Long Name'),
            'is_active' => Yii::t('app', 'Is Active'),
            'nationality' => Yii::t('app', 'Nationality'),
        ];
    }

    /**
     * @inheritdoc
     * @return CountryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountryQuery(get_called_class());
    }
}
