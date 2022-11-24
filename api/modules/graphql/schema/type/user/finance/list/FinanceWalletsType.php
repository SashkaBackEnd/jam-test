<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user\finance\list;

use api\exceptions\IContextableException;
use api\models\user\Finance;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use api\modules\graphql\schema\type\user\finance\FinanceWalletType;
use api\modules\graphql\schema\TypeRegistry;

class FinanceWalletsType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Кошельки пользователя',
            'fields' => fn() => [
                'main' => [
                    'description' => 'Основной кошелек',
                    'type' => TypeRegistry::get(FinanceWalletType::class),
                ],
                'bonus' => [
                    'description' => 'Бонусный кошелек',
                    'type' => TypeRegistry::get(FinanceWalletType::class),
                ],
            ],
            'resolve' => function (Finance $model) {
                try {
                    return [
                        'main' => $model->getWallet('main')->one(),
                        'bonus' => $model->getWallet('bonus')->one(),
                    ];
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }

        ]);
    }
}
