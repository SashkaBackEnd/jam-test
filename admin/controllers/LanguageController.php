<?php

namespace admin\controllers;

use api\exceptions\ApplicationException;
use api\exceptions\BadRequestException;
use yii\web\HttpException;
use Yii;
use yii\filters\AccessControl;
use yii\web\{Controller, Cookie};

class LanguageController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['change'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * Изменение языка
     *
     * @param string $language
     */
    public function actionChange(string $language): \yii\web\Response
    {
        if (is_null($this->request->referrer)) {
            throw new HttpException(500, Yii::t('api', 'Внутренняя проблема сервера'));
        }
        $languageCookie = new Cookie([
            'name' => 'language',
            'value' => $language,
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        Yii::$app->response->cookies->add($languageCookie);

        return $this->redirect($this->request->referrer);
    }
}
