<?php

namespace admin\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\{Controller, Cookie, HttpException};

class CurrencyController extends Controller
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
     * Изменение валюты
     *
     * @param string $currency
     */
    public function actionChange(string $currency): \yii\web\Response
    {
        if (is_null($this->request->referrer)) {
            throw new HttpException(500, Yii::t('api', 'Внутренняя проблема сервера'));
        }
        $currencyCookie = new Cookie([
            'name' => 'currency',
            'value' => $currency,
            'expire' => time() + 60 * 60 * 24 * 30, // 30 days
        ]);
        Yii::$app->response->cookies->add($currencyCookie);

        return $this->redirect($this->request->referrer);
    }
}
