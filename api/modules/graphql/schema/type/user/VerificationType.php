<?php

declare(strict_types=1);

namespace api\modules\graphql\schema\type\user;

use api\exceptions\IContextableException;
use api\models\User;
use api\modules\graphql\errors\GraphqlError;
use api\modules\graphql\schema\ModifiedObjectType;
use common\models\Verification;
use GraphQL\Type\Definition\Type;

class VerificationType extends ModifiedObjectType
{
    public function __construct()
    {
        parent::__construct([
            'description' => 'Склад',
            'fields' => fn() => [
                'id' => [
                    'type' => Type::id(),
                    'resolve' => function () {
                        return 'verification';
                    }
                ],
                'status' => [
                    'type' => Type::string(),
                    'resolve' => function (Verification $model) {
                        return match ($model->verificated_status) {
                            1 => 'not_passed',
                            2 => 'processed',
                            3 => 'completed',
                        };
                    }
                ],
                'person_status' => [
                    'type' => Type::string(),
                    'resolve' => function (Verification $model) {
                        return match ($model->verificated_step_1_status) {
                            1 => 'not_passed',
                            2 => 'processed',
                            3 => 'completed',
                        };
                    }
                ],
                'bank_status' => [
                    'type' => Type::string(),
                    'resolve' => function (Verification $model) {
                        return match ($model->verificated_step_2_status) {
                            1 => 'not_passed',
                            2 => 'processed',
                            3 => 'completed',
                        };
                    }
                ],
                'treaty_status' => [
                    'type' => Type::string(),
                    'resolve' => function (Verification $model) {
                        return match ($model->verificated_step_3_status) {
                            1 => 'not_passed',
                            2 => 'processed',
                            3 => 'completed',
                        };
                    }
                ],
            ],
            'resolve' => function (User $model) {
                try {
                    return $model->getVerification()->one();
                } catch (IContextableException $e) {
                    throw new GraphqlError($e);
                }
            }
        ]);
    }
}
