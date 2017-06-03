<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Stuck]].
 *
 * @see Stuck
 */
class StuckQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Stuck[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Stuck|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
