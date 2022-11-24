<?php

declare(strict_types=1);

namespace api\modules\rest\controllers;

use Yii;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use api\traits\{TraitAuthenticate, TraitResponseFormatter};
use api\modules\rest\forms\{RequestSendForm, RequestNewForm};

class RequestController extends Controller
{
    use TraitResponseFormatter;
    use TraitAuthenticate;

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'send' => ['POST'],
                        'new' => ['POST'],
                    ],
                ],
            ]
        );
    }

    //! DEPRECATED
    /**
     * Отправка запроса с лендинга на почту менеджеру
     *
     * @return array
     */
    public function actionSend()
    {
        $model = new RequestSendForm(Yii::$app->request->getBodyParams());

        if ($model->validate()) {
            if ($model->saveRequestGuest()) {
                $model->upload();
                $model->sendMail();

                return $this->renderSuccess(Yii::t('api', 'Запрос успешно отправлен'), 201);
            } else {
                return $this->renderError(Yii::t('api', 'Не удалось отправить запрос'), 500, $model->getFirstErrors());
            }
        }

        return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
    }

    //! DEPRECATED
    /**
     * Создание новой заявки из ЛК
     *
     * @return array
     */
    public function actionNew()
    {
        $model = new RequestNewForm(Yii::$app->request->getBodyParams());
        $model->user = $this->getAuthenticationUser($this->getBearerToken());

        if (!$model->validate()) {
            return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422);
        }

        if ($model->saveRequest()) {
            $model->upload();
            $model->sendMail();

            return $this->renderSuccess(Yii::t('api', 'Заявка успешно создана'), 201);
        } else {
            return $this->renderError(Yii::t('api', 'Не удалось создать заявку'), 500);
        }
    }
}
