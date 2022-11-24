<?php

declare(strict_types=1);

namespace api\models;

use common\extensions\BehaviorHelper;
use common\models\base\Attachment;
use common\models\base\CataloguesProducts;
use common\models\base\Products as BaseProducts;
use common\models\base\ProductsLang;
use common\models\base\ProductsPackagesMap;
use common\models\base\query\CataloguesLangQuery;
use common\models\base\query\CataloguesQuery;
use common\models\base\query\ProductsLangQuery;
use common\models\base\query\ProductsQuery;
use yii\base\InvalidConfigException;
use yii\db\ActiveQueryInterface;

class Product extends BaseProducts
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
                'author_id' => BehaviorHelper::getBehaviorBy(),
                'author_ip' => BehaviorHelper::getBehaviorIp(),
                'author_timestamp' => BehaviorHelper::getBehaviorAt(),
            ] + parent::behaviors();
    }

    public function getName(): ?string
    {
        return $this->lang->name ?? null;
    }

    public function getDescription(): ?string
    {
        return $this->lang->description ?? null;
    }

    public function getOrderDescription(): ?string
    {
        return $this->lang->order_description ?? null;
    }

    public function getBriefText(): ?string
    {
        return $this->lang->brief_text ?? null;
    }

    /**
     * Gets query for [[Attachment]].
     *
     * @return ActiveQueryInterface|CataloguesLangQuery
     */
    public function getImages(): ActiveQueryInterface|CataloguesLangQuery
    {
        return $this->hasMany(Attachment::class, ['object_id' => 'id'])
            ->andWhere(['attachment.is_image' => 1])
            ->andWhere(['attachment.object_alias' => 'products']);
    }

    /**
     * Gets query for [[ProductsPackages]].
     *
     * @return ActiveQueryInterface|ProductsQuery
     */
    public function getPackages(): ActiveQueryInterface|ProductsQuery
    {
        return $this->hasMany(ProductsPackagesMap::class, ['products_packages__id' => 'id']);
    }

    /**
     * Gets query for [[ProductsPackages]].
     *
     * @return ActiveQueryInterface|CataloguesQuery
     * @throws InvalidConfigException
     */
    public function getCatalogs(): ActiveQueryInterface|CataloguesQuery
    {
        return $this->hasMany(Catalog::class, ['id' => 'catalogues_id'])
            ->viaTable(CataloguesProducts::tableName(), ['products_id' => 'id']);
    }

    /**
     * Gets query for [[ProductsLang]].
     *
     * @return ActiveQueryInterface|ProductsLangQuery
     */
    public function getLang(): ActiveQueryInterface|ProductsLangQuery
    {
        return $this->hasOne(ProductsLang::className(), ['product__id' => 'id'])
            ->where([ProductsLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * {@inheritdoc}
     * @return ProductsQuery the active query used by this AR class.
     */
    public static function find(): ProductsQuery
    {
        return new ProductsQuery(get_called_class());
    }
}
