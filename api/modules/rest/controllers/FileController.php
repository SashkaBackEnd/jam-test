<?php

declare(strict_types=1);

namespace api\modules\rest\controllers;

use api\models\Document;
use Yii;
use api\modules\rest\forms\FileUploadForm;
use api\traits\TraitResponseFormatter;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\rest\Controller;
use yii\web\NotFoundHttpException;

class FileController extends Controller
{
    use TraitResponseFormatter;

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
                        'upload' => ['POST'],
                        'download' => ['GET'],
                    ],
                ],
            ]
        );
    }

    public function actionUpload()
    {
        $model = new FileUploadForm(Yii::$app->request->getBodyParams());

        if ($model->upload()) {
            $data = $model->getFilesHash();

            return $this->renderSuccess(Yii::t('api', 'Файл успешно загружен'), 201, $data);
        }

        return $this->renderError(Yii::t('api', 'Ошибка валидации данных'), 422, $model->getErrors());
    }

    public function actionDownload(string $hash): void
    {
        $model = Document::findOne(['hash' => $hash]);

        if ($model && file_exists($model->fileForDownload())) {
            Yii::$app->response->sendFile($model->fileForDownload(), $model->name)->send();
        }

        throw new NotFoundHttpException(Yii::t('app', 'Документ не найден'));
    }
}
