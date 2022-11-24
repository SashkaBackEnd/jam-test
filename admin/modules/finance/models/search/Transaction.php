<?php

namespace admin\modules\finance\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\finance\models\Transaction as TransactionModel;

/**
 * Transaction represents the model behind the search form of `admin\modules\finance\models\Transaction`.
 */
class Transaction extends TransactionModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'need_to_confirm', 'is_self_employed', 'parent_id', 'debit_wallet_id', 'debit_object_id', 'credit_wallet_id', 'credit_object_id', 'is_confirm_system', 'is_confirm_debit_object', 'is_confirm_credit_object', 'is_confirm_admin', 'is_service', 'is_hide_from_user', 'created_by', 'modified_by'], 'integer'],
            [['debit_wallet_type_alias', 'debit_object_alias', 'credit_wallet_type_alias', 'credit_object_alias', 'currency_alias', 'date_open', 'date_closed', 'date_decline', 'group_alias', 'spec_alias', 'status_alias', 'guid', 'redirect_open', 'redirect_confirm', 'redirect_decline', 'created_at', 'created_ip', 'modified_at', 'modified_ip', 'decline_comment'], 'safe'],
            [['amount', 'debit_wallet_credit_before', 'debit_wallet_credit_after', 'debit_wallet_debit_before', 'debit_wallet_debit_after', 'debit_wallet_balance_before', 'debit_wallet_balance_after', 'credit_wallet_credit_before', 'credit_wallet_credit_after', 'credit_wallet_debit_before', 'credit_wallet_debit_after', 'credit_wallet_balance_before', 'credit_wallet_balance_after'], 'number'],
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
        $query = TransactionModel::find();

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
            'need_to_confirm' => $this->need_to_confirm,
            'is_self_employed' => $this->is_self_employed,
            'parent_id' => $this->parent_id,
            'debit_wallet_id' => $this->debit_wallet_id,
            'debit_object_id' => $this->debit_object_id,
            'credit_wallet_id' => $this->credit_wallet_id,
            'credit_object_id' => $this->credit_object_id,
            'date_open' => $this->date_open,
            'date_closed' => $this->date_closed,
            'date_decline' => $this->date_decline,
            'amount' => $this->amount,
            'is_confirm_system' => $this->is_confirm_system,
            'is_confirm_debit_object' => $this->is_confirm_debit_object,
            'is_confirm_credit_object' => $this->is_confirm_credit_object,
            'is_confirm_admin' => $this->is_confirm_admin,
            'debit_wallet_credit_before' => $this->debit_wallet_credit_before,
            'debit_wallet_credit_after' => $this->debit_wallet_credit_after,
            'debit_wallet_debit_before' => $this->debit_wallet_debit_before,
            'debit_wallet_debit_after' => $this->debit_wallet_debit_after,
            'debit_wallet_balance_before' => $this->debit_wallet_balance_before,
            'debit_wallet_balance_after' => $this->debit_wallet_balance_after,
            'credit_wallet_credit_before' => $this->credit_wallet_credit_before,
            'credit_wallet_credit_after' => $this->credit_wallet_credit_after,
            'credit_wallet_debit_before' => $this->credit_wallet_debit_before,
            'credit_wallet_debit_after' => $this->credit_wallet_debit_after,
            'credit_wallet_balance_before' => $this->credit_wallet_balance_before,
            'credit_wallet_balance_after' => $this->credit_wallet_balance_after,
            'is_service' => $this->is_service,
            'is_hide_from_user' => $this->is_hide_from_user,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'debit_wallet_type_alias', $this->debit_wallet_type_alias])
            ->andFilterWhere(['like', 'debit_object_alias', $this->debit_object_alias])
            ->andFilterWhere(['like', 'credit_wallet_type_alias', $this->credit_wallet_type_alias])
            ->andFilterWhere(['like', 'credit_object_alias', $this->credit_object_alias])
            ->andFilterWhere(['like', 'currency_alias', $this->currency_alias])
            ->andFilterWhere(['like', 'group_alias', $this->group_alias])
            ->andFilterWhere(['like', 'spec_alias', $this->spec_alias])
            ->andFilterWhere(['like', 'status_alias', $this->status_alias])
            ->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'redirect_open', $this->redirect_open])
            ->andFilterWhere(['like', 'redirect_confirm', $this->redirect_confirm])
            ->andFilterWhere(['like', 'redirect_decline', $this->redirect_decline])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip])
            ->andFilterWhere(['like', 'decline_comment', $this->decline_comment]);

        return $dataProvider;
    }
}
