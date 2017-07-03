<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "county".
 *
 * @property string $id
 * @property integer $country_id
 * @property string $name
 * @property integer $is_active
 */
class County extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'county';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country_id', 'is_active'], 'integer'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'country_id' => Yii::t('app', 'Country ID'),
            'name' => Yii::t('app', 'Name'),
            'is_active' => Yii::t('app', 'Is Active'),
        ];
    }

    /**
     * @inheritdoc
     * @return CountyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CountyQuery(get_called_class());
    }
}
