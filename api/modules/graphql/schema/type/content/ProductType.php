<?php

namespace api\modules\graphql\schema\type\content;

use api\exceptions\IContextableException;
use api\models\Product;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\content\list\CatalogsType;
use api\modules\graphql\schema\type\content\list\ProductPackagesType;
use api\modules\graphql\schema\type\content\list\ProductsType;
use api\modules\graphql\schema\TypeRegistry;
use GraphQL\Type\Definition\{InputObjectType, Type};
use yii\helpers\ArrayHelper;

class ProductType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Информация о товаре',
            'fields' => fn() => [
                'id' => Type::int(),
                'is_new' => [
                    'description' => 'Новинка',
                    'type' => Type::boolean()
                ],
                'name' => [
                    'description' => 'Название',
                    'type' => Type::string()
                ],
                'description' => [
                    'description' => 'Описание',
                    'type' => Type::string()
                ],
                'order_description' => [
                    'description' => 'Краткое описание',
                    'type' => Type::string()
                ],
                'brief_text' => [
                    'description' => 'Описание',
                    'type' => Type::string()
                ],
                'product_type' => [
                    'description' => 'Тип товара. material-Товар, kit-Комплект, start_package-Стартовый пакет, activate-Активация приложения, getcourse_api-Товар Getcourse',
                    'type' => Type::string()
                ],
                'price' => [
                    'description' => 'Цена',
                    'type' => Type::float()
                ],
                'price_r' => [
                    'description' => 'Цена в рублях',
                    'type' => Type::int(),
                    'resolve' => function (Product $model) {
                        return round($model->price * 128);
                    }
                ],
                'discount_price_r' => [
                    'description' => 'Цена для партеров в рублях',
                    'type' => Type::int(),
                    'resolve' => function (Product $model) {
                        return round($model->points * 128);
                    }
                ],
                'points' => [
                    'description' => 'Баллы',
                    'type' => Type::float()
                ],
                'discount_partner' => [
                    'description' => 'Партнерская скидка,%',
                    'type' => Type::float()
                ],
                'is_left_zero' => [
                    'description' => 'Заказ при отсутствии товара',
                    'type' => Type::boolean()
                ],
                'left_zero' => [
                    'description' => 'Доступное количество',
                    'type' => Type::int()
                ],
                'product_special_statuses__id' => [
                    'description' => 'Особый статус. 1-Новинка, 2-Скидка',
                    'type' => Type::int()
                ],
                'defult_visibility_status' => [
                    'description' => 'Доступность товара по умолчанию (avaliable-Доступен, visible-Отображается(нет возможности купить), hidden-Скрыт)',
                    'type' => Type::string()
                ],
                'article' => [
                    'description' => 'Артикул',
                    'type' => Type::string()
                ],
                'status' => [
                    'description' => 'Статус 0-Активный, 1-Не активный, 2-Удаленный',
                    'type' => Type::string()
                ],
                'available' => [
                    'description' => 'Товар на складе. 0-В наличии, 1-Нет в наличии, 2-Предзаказ',
                    'type' => Type::string()
                ],
                'width' => [
                    'description' => 'Ширина (см)',
                    'type' => Type::string()
                ],
                'height' => [
                    'description' => 'Высота (см)',
                    'type' => Type::string()
                ],
                'length' => [
                    'description' => 'Длина (см)',
                    'type' => Type::string()
                ],
                'weight' => [
                    'description' => 'Вес (кг)',
                    'type' => Type::string()
                ],
                'volume' => [
                    'description' => 'Объем (мл)',
                    'type' => Type::int()
                ],
                'quantity_in_one_place' => [
                    'description' => 'Количество в одном месте',
                    'type' => Type::int()
                ],
                'leftover' => [
                    'description' => 'Порог остатков',
                    'type' => Type::int()
                ],
                'catalogs' => TypeRegistry::get(CatalogsType::class)->getConfig(),
                'packages' => TypeRegistry::get(ProductPackagesType::class)->getConfig(),
                'recommend' => [
                    'type' => TypeRegistry::get(ProductsType::class),
                    'args' => [
                        'limit' => Type::int(),
                        'offset' => Type::int(),
                    ],
                    'resolve' => function (Product $model) {
                        $query = Product::find()->byCatalogIds(ArrayHelper::getColumn($model->catalogs, 'id'));

                        $query->limit($args['limit'] ?? null);
                        $query->offset($args['offset'] ?? null);

                        return $query->getArrayEntity();
                    }
                ],
                'images' => [
                    'type' => Type::listOf(TypeRegistry::get(ProductImageType::class)),
                    'resolve' => function (Product $model) {
                        return $model->getImages()->all();
                    }
                ],
            ],
            'args' => [
                'filter' => new InputObjectType([
                    'name' => 'FilterProduct',
                    'fields' => [
                        'id' => Type::int(),
                    ]
                ]),
            ],
            'resolve' => function ($model, $args) {
                try {
                    $query = Product::find();

                    (isset($args['filter']['id'])) and $query->byId($args['filter']['id']);

                    return $query->one() ?? null;
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
