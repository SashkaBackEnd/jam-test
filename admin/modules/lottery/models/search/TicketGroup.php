<?php

namespace admin\modules\lottery\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\lottery\models\TicketGroup as TicketGroupModel;

/**
 * TicketGroup represents the model behind the search form of `admin\modules\lottery\models\TicketGroup`.
 */
class TicketGroup extends TicketGroupModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'users__id', 'type', 'object_id', 'created_by', 'modified_by'], 'integer'],
            [['object_alias', 'info', 'created_at', 'created_ip', 'modified_at', 'modified_ip'], 'safe'],
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
        $query = TicketGroupModel::find();

        $query->select(['*',
            'date' => "DATE_FORMAT(".self::tableName().".created_at, '%Y-%m-%d')",
            'group' => "group_concat(LPAD(".self::tableName().".id, 5, '0') SEPARATOR ', ')"])
            ->groupBy([
                self::tableName() . '.users__id',
                self::tableName() . '.type',
                'date'
            ])
            ->orderBy(['date' => SORT_DESC]);
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
            'users__id' => $this->users__id,
            'type' => $this->type,
            'object_id' => $this->object_id,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'object_alias', $this->object_alias])
            ->andFilterWhere(['like', 'info', $this->info])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip]);

        return $dataProvider;
    }
}
