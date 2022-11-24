<?php

namespace api\modules\graphql\schema\type\segment;

use api\modules\graphql\schema\ModifiedObjectType;
use common\models\base\Attachment;
use GraphQL\Type\Definition\{Type};
use Yii;

class AttachmentType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Пол',
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
                            str_replace('home/newworld/antaresproduct.com/web/projects/newworld', 'storage', $model->file_path) .
                            $model->raw_name . $model->file_ext;
                    }
                ],
            ]
        ]);
    }
}
