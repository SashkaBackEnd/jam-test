<?php

namespace common\components;

use common\domain\entity\ArrayEntity;
use common\domain\entity\MetaEntity;

class ActiveQuery extends \yii\db\ActiveQuery
{
    /**
     * @param null $db
     * @return ArrayEntity|null
     */
    public function getArrayEntity($db = null): ?ArrayEntity
    {
        if (!$count = parent::count()) {
            return null;
        }

        return new ArrayEntity(
            meta: new MetaEntity(count: $count, limit: $this->limit ?? 0, offset: $this->offset ?? 0),
            list: parent::all($db),
        );
    }
}
