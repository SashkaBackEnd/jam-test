<?php

namespace app\modules\user\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\user\models\Verification as VerificationModel;

/**
 * Verification represents the model behind the search form of `admin\modules\user\models\Verification`.
 */
class Verification extends VerificationModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'users__id', 'verificated_status', 'verificated_step_1_status', 'verificated_step_2_status', 'verificated_step_3_status', 'complete_verificated_status', 'created_by', 'modified_by'], 'integer'],
            [['start_verificate_process_at', 'complete_verificate_process_at', 'start_verificate_step_1', 'complete_verificate_step_1', 'start_verificate_step_2', 'complete_verificate_step_2', 'start_verificate_step_3', 'complete_verificate_step_3', 'created_at', 'created_ip', 'modified_at', 'modified_ip'], 'safe'],
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
        $query = VerificationModel::find();

        $query->joinWith('user')->where('users.id IS NOT NULL');
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
            'start_verificate_process_at' => $this->start_verificate_process_at,
            'complete_verificate_process_at' => $this->complete_verificate_process_at,
            'verificated_status' => $this->verificated_status,
            'verificated_step_1_status' => $this->verificated_step_1_status,
            'verificated_step_2_status' => $this->verificated_step_2_status,
            'verificated_step_3_status' => $this->verificated_step_3_status,
            'complete_verificated_status' => $this->complete_verificated_status,
            'start_verificate_step_1' => $this->start_verificate_step_1,
            'complete_verificate_step_1' => $this->complete_verificate_step_1,
            'start_verificate_step_2' => $this->start_verificate_step_2,
            'complete_verificate_step_2' => $this->complete_verificate_step_2,
            'start_verificate_step_3' => $this->start_verificate_step_3,
            'complete_verificate_step_3' => $this->complete_verificate_step_3,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
        ]);

        $query->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip]);

        return $dataProvider;
    }
}
