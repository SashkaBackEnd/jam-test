<?php

namespace app\modules\invoice\models\search;

use admin\modules\invoice\models\Invoice as InvoiceModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Invoice represents the model behind the search form of `admin\modules\invoice\models\Invoice`.
 */
class Invoice extends InvoiceModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'id',
                    'war_statement__id_in',
                    'war_statement__id_out',
                    'object_id_to',
                    'object_id_from',
                    'status__id',
                    'type__id',
                    'horder__id',
                    'storekeeper__id',
                    'is_request',
                    'telegram_info',
                    'queue_update_products',
                    'created_by',
                    'modified_by'
                ],
                'integer'
            ],
            [
                [
                    'number',
                    'object_alias_to',
                    'object_alias_from',
                    'status_chage_date',
                    'date',
                    'notes',
                    'attachments',
                    'created_at',
                    'created_ip',
                    'modified_at',
                    'modified_ip'
                ],
                'safe'
            ],
            [['delivery_price', 'amount', 'point', 'amount_delivery'], 'number'],
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
        $query = InvoiceModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC
                ]
            ]
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
            'delivery_price' => $this->delivery_price,
            'war_statement__id_in' => $this->war_statement__id_in,
            'war_statement__id_out' => $this->war_statement__id_out,
            'object_id_to' => $this->object_id_to,
            'object_id_from' => $this->object_id_from,
            'amount' => $this->amount,
            'point' => $this->point,
            'amount_delivery' => $this->amount_delivery,
            'status__id' => $this->status__id,
            'status_chage_date' => $this->status_chage_date,
            'type__id' => $this->type__id,
            'horder__id' => $this->horder__id,
            'storekeeper__id' => $this->storekeeper__id,
            'is_request' => $this->is_request,
            'date' => $this->date,
            'telegram_info' => $this->telegram_info,
            'queue_update_products' => $this->queue_update_products,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'object_alias_to', $this->object_alias_to])
            ->andFilterWhere(['like', 'object_alias_from', $this->object_alias_from])
            ->andFilterWhere(['like', 'notes', $this->notes])
            ->andFilterWhere(['like', 'attachments', $this->attachments])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip]);

        return $dataProvider;
    }
}
