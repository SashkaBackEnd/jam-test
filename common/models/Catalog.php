<?php

declare(strict_types=1);

namespace common\models;

use common\extensions\BehaviorHelper;
use common\models\base\Catalogues as BaseCatalogues;
use common\models\base\CataloguesLang;
use common\models\base\CataloguesProducts;
use common\models\base\query\CataloguesLangQuery;
use yii\base\InvalidConfigException;
use yii\db\ActiveQueryInterface;

class Catalog extends BaseCatalogues
{
    /**
     * Gets query for [[CatalogLang]].
     *
     * @return ActiveQueryInterface|CataloguesLangQuery
     */
    public function getLang(): ActiveQueryInterface|CataloguesLangQuery
    {
        return $this->hasOne(CataloguesLang::className(), ['catalogues__id' => 'id'])
            ->where([CataloguesLang::tableName().'.lang' => 'ru']);
    }

    /**
     * Gets query for [[CataloguesPackages]].
     *
     * @return ActiveQueryInterface
     * @throws InvalidConfigException
     */
    public function getProducts(): ActiveQueryInterface
    {
        return $this->hasMany(Product::class, ['id' => 'products_id'])
            ->viaTable(CataloguesProducts::tableName(), ['catalogues_id' => 'id']);
    }

}
