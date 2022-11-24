<?php

namespace api\services;

use Yii;
use api\exceptions\{RuntimeException, UnprocessableEntityException};
use api\modules\graphql\forms\AccountWalletCreateForm;

class AccountWalletCreateService
{
    public function __construct(private array $model = [], private array $args = [])
    {
    }

    public function run()
    {
        $model = new AccountWalletCreateForm($this->args);
        $model->user = $this->rootValue['user'];

        if (!$model->validate()) {
            throw (new UnprocessableEntityException(Yii::t('api', 'Ошибка валидации данных')))
                ->setContext(['fields' => $model->getErrors()]);
        }

        if ($model->save()) {
            return $model->getAccountWallet();
        }

        throw new RuntimeException('Internal Server Error');
    }
}
