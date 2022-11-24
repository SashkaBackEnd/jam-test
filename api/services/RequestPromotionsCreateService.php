<?php

namespace api\services;

use Yii;
use api\exceptions\{RuntimeException, UnprocessableEntityException};
use api\modules\graphql\forms\RequestCreateForm;
use yii\helpers\ArrayHelper;

class RequestPromotionsCreateService
{
    public function __construct(private array $model = [], private array $args = [])
    {
    }

    public function run()
    {
        $model = new RequestCreateForm($this->args);
        $model->user = $this->rootValue['user'];

        if (!$model->validate()) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Ошибка валидации данных')))
                ->setContext(['fields' => $model->getErrors()]);
        }

        if ($model->save()) {
            $subject = 'Request from Jam.Market promotions';
            $model->sendMail($subject);

            return $model->getRequest();
        }

        throw new RuntimeException('Internal Server Error');
    }
}
