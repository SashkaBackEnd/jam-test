<?php

declare(strict_types=1);

namespace common\services;

use common\extensions\Esputnik\EsputnikApi;
use common\models\base\MailLog;
use Yii;
use yii\base\Exception;
use yii\db\Expression;
use yii\helpers\{ArrayHelper, Json};

class MailSenderService
{
    /**
     * @param string $subject
     * @param string $body
     * @param array $emails
     * @param string $provider
     *
     * @return bool
     * @throws \Throwable
     */
    public function send(string $subject, string $body, array $emails, string $provider = 'esputnik'): bool
    {
        $from = ArrayHelper::getValue(\Yii::$app->params, 'mail_service.esputnik_api.from');
        try {
            $response = (new EsputnikApi())->sendEmail($from, $subject, $body, $emails);
            $response = (string)$response;
        } catch (\Throwable $th) {
            throw $th;
        }

        $result = Json::decode($response);
        $resultStatus = ArrayHelper::getValue($result, 'results.status');
        $resultStatus = ArrayHelper::getValue($result, 'results.0.status', $resultStatus);
        $responseStatus = ($resultStatus == EsputnikApi::STATUS_SEND_MESSAGE_OK) ? true : false;

        $this->saveMailLog($from, $emails, $body, $resultStatus, (string)$response, $provider);

        return $responseStatus;
    }

    public function sendByTemplate(
        string $subject,
        string $template,
        array $params,
        array $emails,
        string $provider = 'esputnik'
    ): bool {
        $fileName = Yii::getAlias('@common/mail') . '/' . $template;

        if (!file_exists($fileName)) {
            throw new Exception(Yii::t('app', 'Шаблона письма не существует'));
        }

        $body = file_get_contents($fileName);
        foreach ($params as $key => $value) {
            $body = str_replace('{{' . $key . '}}', $value, $body);
        }

        return $this->send($subject, $body, $emails, $provider);
    }

    /**
     * @param string $from
     * @param array $emails
     * @param string $body
     * @param string $resultStatus
     * @param string $response
     * @param string $provider
     */
    public function saveMailLog(
        string $from,
        array $emails,
        string $body,
        string $resultStatus,
        string $response,
        string $provider
    ): void {
        $mailLog = new MailLog();
        $mailLog->email_from = $from;
        $mailLog->email_to = implode(',', $emails);
        $mailLog->body = $body;
        $mailLog->status = $resultStatus;
        $mailLog->provider = $provider;
        $mailLog->response = $response;
        $mailLog->date_send = new Expression('CURRENT_TIMESTAMP');

        if (!$mailLog->save()) {
            Yii::warning(
                [
                    'msg' => 'Не удалось сохранить запись о письме в БД',
                    'errors' => $mailLog->getErrors(),
                ],
                __CLASS__
            );
        }
    }
}
