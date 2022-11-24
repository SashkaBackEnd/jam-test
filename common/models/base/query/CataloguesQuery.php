<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\Catalogues]].
 *
 * @see \common\models\base\Catalogues
 */
class CataloguesQuery extends \common\components\ActiveQuery
{
    /**
     * @param int $id
     * @return ProductsQuery
     */
    public function byId(int $id): CataloguesQuery
    {
        return $this->andWhere(['catalogues.id' => $id]);
    }

    /**
     * @param array $ids
     * @return CataloguesQuery
     */
    public function byIds(array $ids): CataloguesQuery
    {
        return $this->andWhere(['catalogues.id' => $ids]);
    }

    /**
     * @param int $level
     * @return CataloguesQuery
     */
    public function byLevel(int $level): CataloguesQuery
    {
        return $this->andWhere(['catalogues.tree_level' => $level]);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\Catalogues[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\Catalogues|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
