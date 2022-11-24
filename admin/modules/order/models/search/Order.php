<?php

namespace app\modules\order\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\order\models\Order as OrderModel;

/**
 * Order represents the model behind the search form of `admin\modules\order\models\Order`.
 */
class Order extends OrderModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'is_sync_a', 'users__id', 'user_currency', 'store_delivery_types__id', 'store_pay_types__id', 'war_warehouse__id', 'delivery_war_warehouse__id', 'store_delivery_types_options__id', 'currencies_rate__id', 'status', 'is_payed', 'is_unregistered_customer', 'country__id', 'region__id', 'city__id', 'zip_code', 'is_from_store', 'is_getcourse', 'created_by', 'modified_by', 'add_discount'], 'integer'],
            [['num', 'commentary', 'first_name', 'last_name', 'second_name', 'district', 'phone', 'address', 'street', 'apartments', 'admin_commentary', 'track_number', 'additional_field', 'closed_at', 'declined_at', 'created_at', 'created_ip', 'modified_at', 'modified_ip'], 'safe'],
            [['total_price', 'total_points', 'total_discount', 'user_price', 'delivery_price', 'user_delivery_price'], 'number'],
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
        $query = OrderModel::find();

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
            'is_sync_a' => $this->is_sync_a,
            'users__id' => $this->users__id,
            'total_price' => $this->total_price,
            'total_points' => $this->total_points,
            'total_discount' => $this->total_discount,
            'user_price' => $this->user_price,
            'user_currency' => $this->user_currency,
            'delivery_price' => $this->delivery_price,
            'user_delivery_price' => $this->user_delivery_price,
            'store_delivery_types__id' => $this->store_delivery_types__id,
            'store_pay_types__id' => $this->store_pay_types__id,
            'war_warehouse__id' => $this->war_warehouse__id,
            'delivery_war_warehouse__id' => $this->delivery_war_warehouse__id,
            'store_delivery_types_options__id' => $this->store_delivery_types_options__id,
            'currencies_rate__id' => $this->currencies_rate__id,
            'status' => $this->status,
            'is_payed' => $this->is_payed,
            'is_unregistered_customer' => $this->is_unregistered_customer,
            'country__id' => $this->country__id,
            'region__id' => $this->region__id,
            'city__id' => $this->city__id,
            'zip_code' => $this->zip_code,
            'closed_at' => $this->closed_at,
            'declined_at' => $this->declined_at,
            'is_from_store' => $this->is_from_store,
            'is_getcourse' => $this->is_getcourse,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
            'add_discount' => $this->add_discount,
        ]);

        $query->andFilterWhere(['like', 'num', $this->num])
            ->andFilterWhere(['like', 'commentary', $this->commentary])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'second_name', $this->second_name])
            ->andFilterWhere(['like', 'district', $this->district])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'apartments', $this->apartments])
            ->andFilterWhere(['like', 'admin_commentary', $this->admin_commentary])
            ->andFilterWhere(['like', 'track_number', $this->track_number])
            ->andFilterWhere(['like', 'additional_field', $this->additional_field])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip]);

        return $dataProvider;
    }
}
