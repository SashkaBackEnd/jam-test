<?php

namespace common\models\base\query;

use common\models\base\Products;
use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[\common\models\base\Products]].
 *
 * @see \common\models\base\Products
 */
class ProductsQuery extends \common\components\ActiveQuery
{
    /**
     * @param int $id
     * @return ProductsQuery
     */
    public function byId(int $id): ProductsQuery
    {
        return $this->andWhere(['products.id' => $id]);
    }

    /**
     * @param array $catalogIds
     * @return ProductsQuery
     */
    public function byCatalogIds(array $catalogIds): ProductsQuery
    {
        return $this->joinWith('catalogs')
            ->andWhere(['catalogues.id' => $catalogIds]);
    }

    /**
     * {@inheritdoc}
     * @return Products[]|array
     */
    public function all($db = null): array
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Products|array|null
     */
    public function one($db = null): Products|array|null
    {
        return parent::one($db);
    }
}
