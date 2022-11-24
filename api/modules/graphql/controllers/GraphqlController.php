<?php

declare(strict_types=1);

namespace api\modules\graphql\controllers;

use api\exceptions\ApplicationException;
use api\exceptions\ForbiddenHttpException;
use api\exceptions\UnauthorizedHttpException;
use api\modules\graphql\components\GraphQLExtensions;
use api\modules\graphql\schema\type\QueryType;
use api\modules\graphql\schema\TypeRegistry;
use ReflectionException;
use api\traits\{TraitAuthenticate, TraitResponseFormatter};
use GraphQL\Error\{DebugFlag, Error, FormattedError};
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
use RuntimeException;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\helpers\Json;
use yii\rest\Controller;

/**
 * Обработчик GraphQL
 *
 * Документация @see https://webonyx.github.io/graphql-php/
 */
class GraphqlController extends Controller
{
    use TraitAuthenticate;
    use TraitResponseFormatter;

//    /**
//     * @return array
//     * @throws \ReflectionException
//     */
//    public function behaviors(): array
//    {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::class,
//        ];
//        $behaviors['corsFilter'] = [
//            'class' => Cors::class
//        ];
//        return $behaviors;
//    }

//    /**
//     * @inheritdoc
//     * @throws \ReflectionException
//     */
//    protected function verbs()
//    {
//        return [
//            'index' => ['POST', 'GET'],
//        ];
//    }

    /**
     * @throws ReflectionException
     * @throws ForbiddenHttpException
     * @throws UnauthorizedHttpException
     */
    public function actionIndex()
    {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Methods: *');

        $this->getAuthenticationUser($this->getBearerToken());

        $schema = new Schema([
            'query' => TypeRegistry::get(QueryType::class),
//            'mutation' => TypeRegistry::get(Mutation')
        ]);
        $rawInput = file_get_contents("php://input", true);

        if ($rawInput === false) {
            throw new RuntimeException('Failed to get php://input');
        }

        $input = Json::decode($rawInput);
        $query = $input['query'] ?? '';
        $variableValues = $input['variables'] ?? null;

        $model = [
            'token' => $this->getBearerToken(),
        ];

        $result = GraphQL::executeQuery($schema, $query, $model, null, $variableValues)
            ->setErrorFormatter(fn(Error $error): array => FormattedError::createFromException($error))
            ->setErrorsHandler(fn(array $errors, callable $formatter): array => array_map($formatter, $errors));
        $result->extensions = GraphQLExtensions::get();

        if (YII_ENV_DEV) {
            $output = $result->toArray(DebugFlag::INCLUDE_DEBUG_MESSAGE | DebugFlag::INCLUDE_TRACE);
        } else {
            $output = $result->toArray();
        }
        try {
        } catch (ApplicationException $e) {
            $output = [
                'errors' => [FormattedError::createFromException($e)]
            ];
        }

        return $output;
    }
}
