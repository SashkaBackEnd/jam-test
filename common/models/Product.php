<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\CataloguesProducts;
use common\models\base\Products as BaseProducts;
use common\models\base\ProductsLang;
use yii\base\InvalidConfigException;
use yii\db\ActiveQueryInterface;

class Product extends BaseProducts
{
    public const TYPE_ARRAY = [
        'material' => 'Товар',
        'kit' => 'Комплект',
        'start_package' => 'Стартовый пакет',
        'activate' => 'Активация приложения',
        'getcourse_api' => 'Товар Getcourse',
    ];

    /**
     * @return ?string
     */
    public function getType_name(): ?string
    {
        return self::TYPE_ARRAY[$this->product_type] ?? null;
    }

    /**
     * Gets query for [[ProductLang]].
     *
     * @return ActiveQueryInterface
     */
    public function getLang(): ActiveQueryInterface
    {
        return $this->hasOne(ProductsLang::className(), ['product__id' => 'id'])
            ->where([ProductsLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * Gets query for [[ProductsPackages]].
     *
     * @return ActiveQueryInterface
     * @throws InvalidConfigException
     */
    public function getCatalogs(): ActiveQueryInterface
    {
        return $this->hasMany(Catalog::class, ['id' => 'catalogues_id'])
            ->viaTable(CataloguesProducts::tableName(), ['products_id' => 'id']);
    }

}
