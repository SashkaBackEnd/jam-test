<?php

declare(strict_types=1);

namespace api\traits;

use Yii;

// TODO: вынести из Trait в api/formatters/ResponseFormatter.php
/**
 * Примесь для форматирования ответа
 */
trait TraitResponseFormatter
{
    public function renderError(string $message, int $statusCode = 500, array $data = []): array
    {
        Yii::$app->response->statusCode = $statusCode;

        $errors['message'] = $message;

        if (!empty($data)) {
            $errors['extensions']['fields'] = $data;
        }

        return [
            'errors' => $errors,
            'data' => null,
        ];
    }

    public function renderSuccess(string $message, int $statusCode = 200, array $data = []): array
    {
        Yii::$app->response->statusCode = $statusCode;

        return [
            'data' => $data,
            'extensions' => [
                'message' => $message,
            ],
        ];
    }
}
