<?php

declare(strict_types=1);

namespace common\models;

use common\models\base\ActivityHistory;
use common\models\base\LotteryTicket as BaseLotteryTicket;
use common\models\base\query\ActivityHistoryQuery;
use common\models\base\Users as BaseUsers;
use common\models\query\OrderItemQuery;
use common\models\query\ProfileQuery;
use common\models\query\UserQuery;
use common\services\MailSenderService;
use DateTime;
use Exception;
use Firebase\JWT\{JWT, Key};
use Throwable;
use Yii;
use yii\base\InvalidConfigException;
use yii\db\ActiveQueryInterface;
use yii\helpers\{ArrayHelper};
use yii\web\IdentityInterface;

class User extends BaseUsers implements IdentityInterface
{
    /**
     * @return DateTime|null
     */
    public function getDateEndActivity(): DateTime|null
    {
        if ($this->lastActivity) {
            $date = new DateTime($this->lastActivity->created_at);
            $date->modify('+1 month');
            return $date;
        }

        return null;
    }

    /**
     * @param int $userId
     * @return IdentityInterface|null
     */
    public static function findActiveUserById(int $userId): IdentityInterface|null
    {
        return self::find()->byId($userId)->active()->one();
    }

    /**
     * @param $token
     * @param $type
     * @return BaseUsers|null
     */
    public static function findIdentityByAccessToken($token, $type = null): ?BaseUsers
    {
        $jwtParams = Yii::$app->params['jwt'];
        $decodedJwt = JWT::decode($token, new Key($jwtParams['secret'], $jwtParams['algorithm']));

        if (empty($decodedJwt->expire_at) || time() > $decodedJwt->expire_at) {
            return null;
        }

//        if (empty($decodedJwt->expire_at)) {
//            throw new UnauthorizedHttpException('JWT is not valid.');
//        }
//
//        if (time() > $decodedJwt->expire_at) {
//            throw new UnauthorizedHttpException('The token has expired. You must request a new JWT');
//        }
//
//        $user = Users::find()->byId($decodedJwt->user_id)->active()->one();
//
//        if (!$user) {
//            throw new ForbiddenHttpException('User does not exist or is not active');
//        }

        return self::find()->byId((int)$decodedJwt->user_id)->active()->one();
    }

    /**
     * Обрабокта отправки в eSputnik
     *
     * @param string $subject
     * @param string $template
     * @param array $params
     * @param array $emails
     *
     * @return bool
     * @throws Throwable
     */
    private function processingEsputnik(string $subject, string $template, array $params, array $emails): bool
    {
        $mailSender = new MailSenderService();

        return $mailSender->sendByTemplate($subject, $template, $params, $emails);
    }

    /**
     * Отправка почты с ссылкой для подтверждения аккаунта
     *
     * @return bool
     */
    public function sendEmailConfirmAccount()
    {
        $domain = ArrayHelper::getValue(Yii::$app->params, 'domain.main');
        $link = "$domain/?action=confirmEmail&token={$this->verification_token}";
        $subject = 'Confirm your Jam.Market account';
        $params = [
            'link' => $link,
        ];
        $emails = [$this->email, Yii::$app->params['notificationEmail']];

        return $this->processingEsputnik($subject, 'confirm_account.html', $params, $emails);
    }

    /**
     * Отправка почты с ссылкой для подтверждения смены почты
     *
     * @return bool
     * @throws Throwable
     */
    public function sendChangeEmailConfirmAccount()
    {
        $domain = ArrayHelper::getValue(Yii::$app->params, 'domain.main');
        $link = "$domain/?action=confirmChangeEmail&token={$this->verification_token}";
        $subject = 'Confirm your Jam.Market email changing';
        $params = [
            'link' => $link,
            'fio' => $this->getFullName(),
        ];
        $emails = [$this->email_new, Yii::$app->params['notificationEmail']];

        return $this->processingEsputnik($subject, 'change_email.html', $params, $emails);
    }

    /**
     * Отправка почты с ссылкой для изменения пароля
     *
     * @return bool
     */
    public function sendEmailChangePassword()
    {
        $domain = ArrayHelper::getValue(Yii::$app->params, 'domain.main');
        $link = "$domain/?action=changePassword&token={$this->password_reset_token}";
        $subject = 'Change your password on Jam.Market';
        $params = [
            'link' => $link,
            'fio' => $this->getFullName(),
        ];
        $emails = [$this->email, Yii::$app->params['notificationEmail']];

        return $this->processingEsputnik($subject, 'change_password.html', $params, $emails);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id): array|BaseUsers|IdentityInterface|null
    {
        return self::find()->byId((int)$id)->active()->one();
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): int
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey(): string
    {
        return '';
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * @return ActiveQueryInterface
     */
    public function getLotteryTickets(): ActiveQueryInterface
    {
        return $this->hasOne(BaseLotteryTicket::className(), ['users__id' => 'id']);
    }

    /**
     * @return ActiveQueryInterface|UserQuery
     */
    public function getOrders(string $className = null): ActiveQueryInterface|UserQuery
    {
        if ($className && $className != 'api\models\Order') {
            throw new Exception('Неизвестный класс: ' . $className);
        }

        return $this->hasMany($className ?? Order::className(), ['users__id' => 'id']);
    }

    /**
     * Gets query for [[ActivityHistory]].
     *
     * @return ActiveQueryInterface|ActivityHistoryQuery
     */
    public function getLastActivity(): ActiveQueryInterface|ActivityHistoryQuery
    {
        return $this->hasOne(ActivityHistory::className(), ['users__id' => 'id'])
            ->orderBy(ActivityHistory::tableName() . '.id DESC');
    }

    /**
     * Gets query for [[OrderItem]].
     *
     * @return ActiveQueryInterface|OrderItemQuery
     * @throws InvalidConfigException
     */
    public function getStartPackage(): ActiveQueryInterface|OrderItemQuery
    {
        return $this->hasOne(OrderItem::className(), ['store_horders__id' => 'id'])
            ->viaTable(Order::tableName(), ['users__id' => 'id'])
            ->byProductTypeStartPackage();
    }

    /**
     * Gets query for [[OrderItem]].
     *
     * @return ActiveQueryInterface|OrderItemQuery
     * @throws InvalidConfigException
     */
    public function getStartPackageRow(): ActiveQueryInterface|OrderItemQuery
    {
        return $this->hasOne(OrderItem::className(), ['store_horders__id' => 'id'])
            ->viaTable(Order::tableName(), ['users__id' => 'id']);
    }

    /**
     * Gets query for [[ProfileLang]].
     *
     * @return ActiveQueryInterface|ProfileQuery
     */
    public function getProfile(): ActiveQueryInterface|ProfileQuery
    {
        return $this->hasOne(Profile::className(), ['user__id' => 'id']);
    }

    /**
     * Gets query for [[Verification]].
     *
     * @return ActiveQueryInterface
     */
    public function getVerification(): ActiveQueryInterface
    {
        return $this->hasOne(Verification::className(), ['users__id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UserQuery the active query used by this AR class.
     */
    public static function find(): UserQuery
    {
        return new UserQuery(get_called_class());
    }
}
