<?php

namespace api\modules\graphql\components;

use Yii;

class GraphQLExtensions
{
    public static function set(array $pathArray, string $message): void
    {
        $session = Yii::$app->session;

        $path = $pathArray[0];
        $extensions = $session->get($path);
        $extensions['message'] = $message;

        if (!empty($extensions)) {
            $session->set('extensions', [$path => $extensions]);
        }
    }

    public static function get()
    {
        $session = Yii::$app->session;

        $extensions = $session->get('extensions');
        $session->remove('extensions');

        return $extensions;
    }
}
