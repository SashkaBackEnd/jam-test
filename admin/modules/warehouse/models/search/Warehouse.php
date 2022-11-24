<?php

namespace app\modules\warehouse\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\warehouse\models\Warehouse as WarehouseModel;

/**
 * Warehouse represents the model behind the search form of `admin\modules\warehouse\models\Warehouse`.
 */
class Warehouse extends WarehouseModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'war_warehouse_rank__id', 'custom_num', 'country_id', 'region_id', 'city_id', 'war_type__id', 'office', 'users__id', 'visibility', 'created_by', 'modified_by'], 'integer'],
            [['number', 'info', 'phone', 'email', 'skype', 'legal_details', 'created_at', 'created_ip', 'modified_at', 'modified_ip'], 'safe'],
            [['delivery_price'], 'number'],
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
        $query = WarehouseModel::find();

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
            'war_warehouse_rank__id' => $this->war_warehouse_rank__id,
            'custom_num' => $this->custom_num,
            'delivery_price' => $this->delivery_price,
            'country_id' => $this->country_id,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'war_type__id' => $this->war_type__id,
            'office' => $this->office,
            'users__id' => $this->users__id,
            'visibility' => $this->visibility,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'number', $this->number])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'skype', $this->skype])
            ->andFilterWhere(['like', 'legal_details', $this->legal_details])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip]);

        return $dataProvider;
    }
}
