<?php

namespace api\services;

use Yii;
use api\exceptions\{RuntimeException, UnprocessableEntityException};
use api\modules\graphql\forms\ProfileUpdateForm;

class ProfileUpdateService
{
    public function __construct(private array $model = [], private array $args = [])
    {
    }

    public function run()
    {
        $model = new ProfileUpdateForm($this->args);
        $model->user = $this->rootValue['user'];

        if (!$model->validate()) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Ошибка валидации данных')))
                ->setContext(['fields' => $model->getErrors()]);
        }

        if ($model->save()) {
            return $model->user;
        }

        throw new RuntimeException('Internal Server Error');
    }
}
