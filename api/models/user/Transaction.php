<?php

namespace api\models\user;

use api\models\Company;
use api\models\User;
use common\models\base\FinanceTransactions as BaseFinanceTransactions;
use common\models\base\FinanceTransactionsSpecs;
use common\models\base\FinanceTransactionsStatuses;

class Transaction extends BaseFinanceTransactions
{
    /**
     * @return array|null
     */
    public function getTo(): ?array
    {
        return $this->getAuthor($this->debit_object_alias, $this->debit_object_id);
    }

    /**
     * @return array|null
     */
    public function getFrom(): ?array
    {
        return $this->getAuthor($this->credit_object_alias, $this->credit_object_id);
    }

    /**
     * @param string $object_alias
     * @param int $object_id
     * @return array|null
     */
    public function getAuthor(string $object_alias, int $object_id)
    {
        if ($object_alias == 'users' && ($user = User::find()->byId($object_id)->one())) {
            return [
                'id' => $user->id,
                'name' => $user->getName(),
                'kind' => ['alias' => 'user', 'title' => 'Пользователь'],
            ];
        }
        if ($object_alias == 'company' && ($user = Company::find()->byId($object_id)->one())) {
            return [
                'id' => $this->debit_object_id,
                'name' => $user->getName(),
                'kind' => ['alias' => 'company', 'title' => 'Компания'],
            ];
        }
        return null;
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpec(): \yii\db\ActiveQuery
    {
        return $this->hasOne(FinanceTransactionsSpecs::className(), ['alias' => 'spec_alias']);
    }

    /**
     * Gets query for [[Profile]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus(): \yii\db\ActiveQuery
    {
        return $this->hasOne(FinanceTransactionsStatuses::className(), ['alias' => 'status_alias']);
    }


}
