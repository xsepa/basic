<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[CartridgeLoading]].
 *
 * @see CartridgeLoading
 */
class CartridgeLoadingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return CartridgeLoading[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return CartridgeLoading|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
