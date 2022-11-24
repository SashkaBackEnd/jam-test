<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\models\CalendarEvents;
use api\modules\graphql\schema\ModifiedObjectType;
use GraphQL\Type\Definition\Type;

class CalendarEventType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'События в календаре',
            'fields' => fn() => [
                'id' => [
                    'description' => 'Идентификатор',
                    'type' => Type::int(),
                ],
                'title' => [
                    'description' => 'Заголовок',
                    'type' => Type::string(),
                    'resolve' => function (CalendarEvents $model) {
                        return $model->getTitle();
                    }
                ],
                'link' => [
                    'description' => 'Ссылка',
                    'type' => Type::string(),
                    'resolve' => function (CalendarEvents $model) {
                        return $model->getLink();
                    }
                ],
                'text' => [
                    'description' => 'Текст',
                    'type' => Type::string(),
                    'resolve' => function (CalendarEvents $model) {
                        return $model->getText();
                    }
                ],
                'start' => [
                    'description' => 'Дата',
                    'type' => Type::string(),
                ],
                'start_time' => [
                    'description' => 'Время',
                    'type' => Type::string(),
                ],
            ]
        ]);
    }
}
