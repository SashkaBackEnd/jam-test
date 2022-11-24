<?php

declare(strict_types=1);

namespace api\models;

use common\extensions\BehaviorHelper;
use common\models\base\Attachment;
use common\models\base\Catalogues as BaseCatalogues;
use common\models\base\CataloguesLang;
use common\models\base\CataloguesProducts;
use common\models\base\query\CataloguesLangQuery;
use common\models\base\query\CataloguesQuery;
use yii\base\InvalidConfigException;
use common\components\ActiveQuery;

class Catalog extends BaseCatalogues
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

    /**
     * Gets query for [[Attachment]].
     *
     * @return ActiveQuery|CataloguesLangQuery
     */
    public function getImages(): ActiveQuery|CataloguesLangQuery
    {
        return $this->hasMany(Attachment::class, ['object_id' => 'id'])
            ->andWhere(['attachment.is_image' => 1])
            ->andWhere(['attachment.object_alias' => 'catalogues']);
    }

    /**
     * Gets query for [[CataloguesPackages]].
     *
     * @return ActiveQuery|CataloguesLangQuery
     * @throws InvalidConfigException
     */
    public function getProducts(): ActiveQuery|CataloguesLangQuery
    {
        return $this->hasMany(Product::class, ['id' => 'products_id'])
            ->viaTable(CataloguesProducts::tableName(), ['catalogues_id' => 'id']);
    }

    /**
     * Gets query for [[CataloguesLang]].
     *
     * @return ActiveQuery|CataloguesLangQuery
     */
    public function getLang(): ActiveQuery|CataloguesLangQuery
    {
        return $this->hasOne(CataloguesLang::className(), ['catalogues__id' => 'id'])
            ->where([CataloguesLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * {@inheritdoc}
     * @return CataloguesQuery the active query used by this AR class.
     */
    public static function find(): CataloguesQuery
    {
        return new CataloguesQuery(get_called_class());
    }
}
