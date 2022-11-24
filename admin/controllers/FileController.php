<?php

namespace admin\controllers;

use admin\models\Document\Document;
use Yii;
use yii\filters\AccessControl;
use yii\web\{Controller, NotFoundHttpException};

class FileController extends Controller
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
                        'actions' => ['download', 'delete'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * Скачать документ по хешу
     *
     * @param string $hash
     *
     * @throws NotFoundHttpException
     */
    public function actionDownload(string $hash)
    {
        $model = $this->findModel($hash);

        if ($model && file_exists($model->fileForDownload())) {
            Yii::$app->response->sendFile($model->fileForDownload(), $model->name)->send();
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'File not found on server'));
        }
    }

    /**
     * Удалить документ по хешу
     *
     * @param string $hash
     *
     * @throws NotFoundHttpException
     */
    public function actionDelete(string $hash)
    {
        $model = $this->findModel($hash);
        @unlink($model->fileForDownload());
        $model->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }

    /**
     * @param string $hash
     *
     * @return Document|null
     * @throws NotFoundHttpException
     */
    protected function findModel(string $hash): ?Document
    {
        if (($model = Document::findOne(['hash' => $hash])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'Document not found'));
    }
}
