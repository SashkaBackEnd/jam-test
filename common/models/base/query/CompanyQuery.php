<?php

namespace common\models\base\query;

use common\components\ActiveQuery;
use common\models\base\Company;

/**
 * This is the ActiveQuery class for [[\common\models\base\Company]].
 *
 * @see \common\models\base\Company
 */
class CompanyQuery extends ActiveQuery
{
    /**
     * @param int $id
     * @return CompanyQuery
     */
    public function byId(int $id): CompanyQuery
    {
        return $this->andWhere([Company::tableName() . '.id' => $id]);
    }

    /**
     * {@inheritdoc}
     * @return Company[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Company|array|null
     */
    public function one($db = null): array|Company|null
    {
        return parent::one($db);
    }
}
