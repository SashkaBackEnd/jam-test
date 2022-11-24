<?php

namespace api\modules\graphql\schema\type\content;

use api\modules\graphql\schema\ModifiedObjectType;
use common\models\base\Attachment;
use GraphQL\Type\Definition\{Type};
use Yii;

class ProductImageType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Изображения товаров',
            'fields' => fn() => [
                'id' => Type::int(),
                'type' => [
                    'description' => 'Тип',
                    'type' => Type::string(),
                    'resolve' => function (Attachment $model) {
                        return $model->file_type;
                    }
                ],
                'url' => [
                    'description' => 'Путь к файлу',
                    'type' => Type::string(),
                    'resolve' => function (Attachment $model) {
                        return Yii::$app->request->hostInfo .
                            str_replace(
                                'home/newworld/antaresproduct.com/web/projects/newworld',
                                'storage',
                                $model->file_path
                            ) .
                            $model->raw_name . $model->file_ext;
                    }
                ],
                'url_basket_preview' => [
                    'description' => 'Путь к файлу',
                    'type' => Type::string(),
                    'resolve' => function (Attachment $model) {
                        return Yii::$app->request->hostInfo .
                            str_replace(
                                'home/newworld/antaresproduct.com/web/projects/newworld',
                                'storage',
                                $model->file_path
                            ) .
                            $model->raw_name . '_basket_preview' . $model->file_ext;
                    }
                ],
                'url_main' => [
                    'description' => 'Путь к файлу',
                    'type' => Type::string(),
                    'resolve' => function (Attachment $model) {
                        return Yii::$app->request->hostInfo .
                            str_replace(
                                'home/newworld/antaresproduct.com/web/projects/newworld',
                                'storage',
                                $model->file_path
                            ) .
                            $model->raw_name . '_main' . $model->file_ext;
                    }
                ],
            ]
        ]);
    }
}
