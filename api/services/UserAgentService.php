<?php

declare(strict_types=1);

namespace api\services;

use common\models\base\User;
use common\models\base\UserAgent;
use common\services\MailSenderService;
use Yii;
use yii\helpers\ArrayHelper;

class UserAgentService
{
    public function checkAccess(int $userId, string $agent): bool
    {
        try {
            if (!UserAgent::findOneByUserId($userId)) {
                UserAgent::saveUserAgent($userId, $agent);
                return true;
            }

            $userAgent = UserAgent::findOneByUserIdAndAgent($userId, $agent);
            if (!$userAgent) {
                UserAgent::saveUserAgent($userId, $agent);
                $this->sendEmail($userId, $agent);

                return true;
            }


            if (!$userAgent->is_allowed) {
                return false;
            }

            return true;
        } catch (\Exception $exception) {
            Yii::error(
                [
                    'msg' => 'Ошибка при проверке на вход под устройством',
                    'exception' => $exception->getMessage(),
                ],
                __CLASS__
            );

            return false;
        }
    }

    private function sendEmail(int $userId, string $agent)
    {
        $user = User::findOne(['id' => $userId]);
        $email = $user->email;
        $fio = $user->getFullName();
        $link = $this->getLink($userId, $agent);
        $subject = 'Security Alert on Jam.Market';
        $params = [
            'fio' => $fio,
            'agent' => $agent,
            'link' => $link,
        ];
        $emails = [$email, Yii::$app->params['notificationEmail']];

        return (new MailSenderService())->sendByTemplate($subject, 'ban_user.html', $params, $emails);
    }

    private function getLink(int $userId, string $agent)
    {
        $domain = ArrayHelper::getValue(Yii::$app->params, 'domain.main');
        return "$domain/?action=banUserAgent&token={$this->getToken($userId, $agent)}";
    }

    private function getToken(int $userId, string $agent)
    {
        $userAgent = UserAgent::findOneByUserIdAndAgent($userId, $agent);

        if (!$userAgent->token) {
            $userAgent->token = \Yii::$app->security->generateRandomString();
            $userAgent->save();
        }

        return $userAgent->token;
    }
}
