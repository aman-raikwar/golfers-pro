<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[RegistrationCards]].
 *
 * @see RegistrationCards
 */
class RegistrationCardsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RegistrationCards[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RegistrationCards|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
