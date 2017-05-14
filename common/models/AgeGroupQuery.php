<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AgeGroup]].
 *
 * @see AgeGroup
 */
class AgeGroupQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AgeGroup[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AgeGroup|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
