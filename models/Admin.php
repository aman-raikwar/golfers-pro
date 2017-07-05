<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_admin".
 *
 * @property integer $admin_id
 * @property string $admin_firstname
 * @property string $admin_lastname
 * @property integer $admin_userID
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_admin';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['admin_firstname', 'admin_lastname', 'admin_userID'], 'required'],
            [['admin_userID'], 'integer'],
            [['admin_firstname', 'admin_lastname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'admin_id' => Yii::t('app', 'Admin ID'),
            'admin_firstname' => Yii::t('app', 'Admin Firstname'),
            'admin_lastname' => Yii::t('app', 'Admin Lastname'),
            'admin_userID' => Yii::t('app', 'Admin User ID'),
        ];
    }
}
