<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "club_functionality".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property string $created_at
 */
class ClubFunctionality extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'club_functionality';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name'], 'required'],
                [['status'], 'integer'],
                [['created_at'], 'safe'],
                [['name'], 'string', 'max' => 255],
                [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

}
