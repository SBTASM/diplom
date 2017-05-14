<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AgeGroupRace]].
 *
 * @see AgeGroupRace
 */
class AgeGroupRaceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AgeGroupRace[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AgeGroupRace|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
