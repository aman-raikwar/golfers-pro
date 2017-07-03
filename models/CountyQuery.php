<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[County]].
 *
 * @see County
 */
class CountyQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return County[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return County|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
