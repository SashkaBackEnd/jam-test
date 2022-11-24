<?php

namespace api\modules\graphql\forms;

use api\exceptions\RuntimeException;
use api\models\{AccountWallet, User};
use Yii;
use yii\base\Model;

/**
 * Форма для добавления кошелька для аккаунта
 */
class AccountWalletCreateForm extends Model
{
    public string $payment_method;
    public string $wallet;
    public string $available;

    public User $user;
    private AccountWallet $accountWallet;

    public function rules()
    {
        return [
            [['payment_method', 'wallet'], 'required'],
            [['payment_method', 'wallet', 'available'], 'string'],
            [
                'payment_method',
                'in',
                'range' => [AccountWallet::PAYMENT_METHOD_CARD, AccountWallet::PAYMENT_METHOD_CRYPTO_WALLET],
                'message' => Yii::t('api', 'Выберите из предложенных вариантов')
                    . ': '
                    . AccountWallet::PAYMENT_METHOD_CARD
                    . ', '
                    . AccountWallet::PAYMENT_METHOD_CRYPTO_WALLET,
            ],
            [
                'available',
                'in',
                'range' => [AccountWallet::AVAILABLE_FOR_ADMINISTRATOR, AccountWallet::AVAILABLE_FOR_ANY],
                'message' => Yii::t('api', 'Выберите из предложенных вариантов')
                    . ': '
                    . AccountWallet::AVAILABLE_FOR_ADMINISTRATOR
                    . ', '
                    . AccountWallet::AVAILABLE_FOR_ANY,
            ],
            [
                'wallet',
                'unique',
                'targetClass' => AccountWallet::class,
                'targetAttribute' => ['wallet' => 'wallet'],
                'message' => Yii::t('api', 'Кошелек уже занят')
            ]
        ];
    }

    public function save()
    {
        try {
            $accountWallet = new AccountWallet();
            $accountWallet->payment_method = $this->payment_method;
            $accountWallet->wallet = $this->wallet;
            $accountWallet->available = $this->available;
            $accountWallet->account_id = $this->user->account_id;
            $accountWallet->created_by = $this->user->getId();

            if (!$accountWallet->save()) {
                Yii::error([
                    'msg' => Yii::t('api', 'Не удалось добавить кошелек аккаунта'),
                    'errors' => $accountWallet->getErrors()
                ], __CLASS__);

                throw (new RuntimeException(Yii::t('api', 'Не удалось добавить кошелек аккаунта')));
            }

            $this->accountWallet = $accountWallet;

            return true;
        } catch (\Throwable $th) {
            throw new RuntimeException(Yii::t('api', $th->getMessage()));
        }
    }

    public function getAccountWallet(): AccountWallet
    {
        return $this->accountWallet;
    }
}
