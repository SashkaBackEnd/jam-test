<?php

namespace api\modules\graphql\forms;

use api\exceptions\RuntimeException;
use api\models\{Account, AccountWallet, Company, Country, Document, User};
use Yii;
use yii\base\Model;
use yii\helpers\VarDumper;

/**
 * Форма для редактирования кошелька для аккаунта
 */
class AccountWalletUpdateForm extends Model
{
    public string $id;
    public string $payment_method;
    public string $wallet;
    public string $available;

    public User $user;
    private AccountWallet $accountWallet;

    public function rules()
    {
        return [
            [['id', 'payment_method', 'wallet'], 'required'],
            [['id'], 'integer'],
            [['payment_method', 'wallet', 'available'], 'string'],
            [
                'payment_method',
                'in',
                'range' => [AccountWallet::PAYMENT_METHOD_CARD, AccountWallet::PAYMENT_METHOD_CRYPTO_WALLET]
            ],
            [
                'available',
                'in',
                'range' => [AccountWallet::AVAILABLE_FOR_ADMINISTRATOR, AccountWallet::AVAILABLE_FOR_ANY]
            ],
            ['wallet', 'validateUniqueWallet'],
        ];
    }

    public function validateUniqueWallet($attribute)
    {
        $model = AccountWallet::findOne([$attribute => $this->$attribute]);
        if ($model && $model->id != $this->id) {
            $this->addError($attribute, Yii::t('api', 'Кошелек уже занят'));
        }
    }

    /**
     * Принадлежит ли кошелек аккаунта пользователю
     *
     * @return null|AccountWallet
     */
    private function findAccountWallet(): null|AccountWallet
    {
        return AccountWallet::findOne([
            'id' => $this->id,
            'created_by' => $this->user->id
        ]);
    }

    public function save()
    {
        $accountWallet = $this->findAccountWallet();

        try {
            $accountWallet->payment_method = $this->payment_method;
            $accountWallet->wallet = $this->wallet;
            $accountWallet->available = $this->available;

            if (!$accountWallet->save()) {
                throw (new RuntimeException(Yii::t('api', 'Не удалось изменить кошелек аккаунта')))
                    ->setContext(['fields' => $accountWallet->getErrors()]);
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
