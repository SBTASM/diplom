<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Distances]].
 *
 * @see Distances
 */
class DistancesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Distances[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Distances|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
