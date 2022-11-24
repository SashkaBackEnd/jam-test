<?php

namespace api\services;

use Yii;
use api\exceptions\UnprocessableEntityException;
use api\modules\graphql\forms\DocumentDeleteForm;

class DocumentDeleteService
{
    public function __construct(private array $model = [], private array $args = [])
    {
    }

    public function run()
    {
        $model = new DocumentDeleteForm($this->args);
        $model->user = $this->rootValue['user'];

        if (!$model->validate()) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Ошибка валидации данных')))
                ->setContext(['fields' => $model->getErrors()]);
        }

        return $model->markDelete();
    }
}
