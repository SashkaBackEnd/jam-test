<?php

declare(strict_types=1);

namespace api\modules\rest\controllers;

use api\modules\rest\controllers\actions\{AccessTokenAction,
    BanUserAgentAction,
    ChangingForgottenPasswordAction,
    CheckPasswordResetTokenAction,
    ConfirmChangeEmailAction,
    ConfirmEmailAction,
    EmailDataAction,
    LoginAction,
    LogoutAction,
    RegistrationAction,
    RemindAction,
    SendEmailConfirmAction
};
use yii\filters\Cors;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class AuthController extends Controller
{
    public function actions()
    {
        return array_merge(
            parent::actions(),
            [
                'registration' => RegistrationAction::class,
                'remind' => RemindAction::class,
                'confirm-email' => ConfirmEmailAction::class,
                'confirm-change-email' => ConfirmChangeEmailAction::class,
                'login' => LoginAction::class,
                'changing-forgotten-password' => ChangingForgottenPasswordAction::class,
                'logout' => LogoutAction::class,
                'access-token' => AccessTokenAction::class,
                'send-email-confirm' => SendEmailConfirmAction::class,
                'check-password-reset-token' => CheckPasswordResetTokenAction::class,
                'ban-user-agent' => BanUserAgentAction::class,
                'email-data' => EmailDataAction::class,
            ]
        );
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
        ];

        // re-add authentication filter
        $behaviors['authenticator'] = $auth;
        // avoid authentication on CORS-pre-flight requests (HTTP OPTIONS method)
        $behaviors['authenticator']['except'] = ['options'];

        return array_merge(
            $behaviors,
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'registration' => ['POST'],
                        'remind' => ['POST'],
                        'confirm-email' => ['POST'],
                        'confirm-change-email' => ['POST'],
                        'login' => ['POST'],
                        'logout' => ['DELETE'],
                        'change-password' => ['POST'],
                        'access-token' => ['POST'],
                        'check-password-reset-token' => ['POST'],
                        'ban-user-agent' => ['POST'],
                        'email-data' => ['GET'],
                    ],
                ],
            ]
        );
    }
}
