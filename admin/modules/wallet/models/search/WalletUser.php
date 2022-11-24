<?php

namespace admin\modules\wallet\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\wallet\models\Wallet;

/**
 * WalletUser represents the model behind the search form of `admin\modules\wallet\models\Wallet`.
 */
class WalletUser extends Wallet
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'object_id', 'is_set_debit_balance_limit', 'is_set_credit_balance_limit', 'is_allowed_to_manage_in', 'is_allowed_to_manage_out', 'modified_by', 'created_by'], 'integer'],
            [['type_alias', 'object_alias', 'purpose_alias', 'currency_alias', 'status_alias', 'payments_system__alias', 'created_at', 'modified_at', 'modified_ip', 'created_ip'], 'safe'],
            [['debit', 'credit', 'debit_unapproved', 'credit_unapproved', 'balance', 'balance_unapproved', 'balance_blocked', 'debit_balance_limit', 'credit_balance_limit'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Wallet::find();

        $query->byObjectUser();
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'object_id' => $this->object_id,
            'debit' => $this->debit,
            'credit' => $this->credit,
            'debit_unapproved' => $this->debit_unapproved,
            'credit_unapproved' => $this->credit_unapproved,
            'balance' => $this->balance,
            'balance_unapproved' => $this->balance_unapproved,
            'balance_blocked' => $this->balance_blocked,
            'is_set_debit_balance_limit' => $this->is_set_debit_balance_limit,
            'is_set_credit_balance_limit' => $this->is_set_credit_balance_limit,
            'debit_balance_limit' => $this->debit_balance_limit,
            'credit_balance_limit' => $this->credit_balance_limit,
            'is_allowed_to_manage_in' => $this->is_allowed_to_manage_in,
            'is_allowed_to_manage_out' => $this->is_allowed_to_manage_out,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
            'created_by' => $this->created_by,
        ]);

        $query->andFilterWhere(['like', 'type_alias', $this->type_alias])
            ->andFilterWhere(['like', 'object_alias', $this->object_alias])
            ->andFilterWhere(['like', 'purpose_alias', $this->purpose_alias])
            ->andFilterWhere(['like', 'currency_alias', $this->currency_alias])
            ->andFilterWhere(['like', 'status_alias', $this->status_alias])
            ->andFilterWhere(['like', 'payments_system__alias', $this->payments_system__alias])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip]);

        return $dataProvider;
    }
}
