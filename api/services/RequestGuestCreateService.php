<?php

namespace api\services;

use api\exceptions\{RuntimeException, UnprocessableEntityException};
use api\modules\graphql\forms\RequestGuestCreateForm;
use Yii;

class RequestGuestCreateService
{
    public function __construct(private array $model = [], private array $args = [])
    {
    }

    public function run()
    {
        $model = new RequestGuestCreateForm($this->args);

        if (!$model->validate()) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Ошибка валидации данных')))
                ->setContext(['fields' => $model->getErrors()]);
        }

        if ($model->save()) {
            $model->sendMail();

            return $model->getRequestGuest();
        }

        throw new RuntimeException('Internal Server Error');
    }
}
