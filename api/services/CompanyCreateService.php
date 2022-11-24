<?php

namespace api\services;

use api\exceptions\RuntimeException;
use Yii;
use api\exceptions\UnprocessableEntityException;
use api\modules\graphql\forms\CompanyCreateForm;

class CompanyCreateService
{
    public function __construct(private array $model = [], private array $args = [])
    {
    }

    public function run()
    {
        $model = new CompanyCreateForm($this->args);
        $model->user = $this->rootValue['user'];

        if (!$model->validate()) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Ошибка валидации данных')))
                ->setContext(['fields' => $model->getErrors()]);
        }

        if ($model->save()) {
            return [
                'company' => $model->getCompany(),
                'message' => $model->getSuccessMessage(),
            ];
        }

        throw new RuntimeException('Internal Server Error');
    }
}
