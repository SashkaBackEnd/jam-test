<?php

namespace common\models\base\query;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the ActiveQuery class for [[\common\models\base\WarHorders]].
 *
 * @see \common\models\base\WarHorders
 */
class WarHordersQuery extends \common\components\ActiveQuery
{
    /**
     * @param int $id
     * @return WarHordersQuery
     */
    public function byId(int $id): WarHordersQuery
    {
        return $this->andWhere(['war_horders.id' => $id]);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\WarHorders[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return array|ActiveRecord|null
     */
    public function one($db = null): array|ActiveRecord|null
    {
        return parent::one($db);
    }
}
