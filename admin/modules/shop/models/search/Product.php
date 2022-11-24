<?php

namespace app\modules\shop\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\shop\models\Product as ProductModel;

/**
 * Product represents the model behind the search form of `admin\modules\shop\models\Product`.
 */
class Product extends ProductModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'available', 'title_picture__id', 'show_at_home', 'limit', 'is_register', 'currency__id', 'product_special_statuses__id', 'is_deleted', 'is_admin_rating', 'likes_count', 'dislikes_count', 'created_by', 'modified_by', 'width', 'height', 'length', 'admin_likes', 'admin_dislikes', 'left_zero', 'leftover', 'volume', 'quantity_in_one_place', 'activity_month', 'sort'], 'integer'],
            [['alias', 'langs', 'article', 'product_type', 'url', 'price_formation_type', 'defult_visibility_status', 'created_at', 'created_ip', 'modified_at', 'modified_ip', 'getcourse_url'], 'safe'],
            [['price', 'price_max', 'price_client', 'points', 'discount_distr', 'discount_client', 'discount_partner', 'rating', 'admin_rating', 'weight'], 'number'],
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
        $query = ProductModel::find();

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
            'status' => $this->status,
            'available' => $this->available,
            'title_picture__id' => $this->title_picture__id,
            'show_at_home' => $this->show_at_home,
            'price' => $this->price,
            'price_max' => $this->price_max,
            'price_client' => $this->price_client,
            'points' => $this->points,
            'limit' => $this->limit,
            'discount_distr' => $this->discount_distr,
            'discount_client' => $this->discount_client,
            'discount_partner' => $this->discount_partner,
            'is_register' => $this->is_register,
            'currency__id' => $this->currency__id,
            'product_special_statuses__id' => $this->product_special_statuses__id,
            'is_deleted' => $this->is_deleted,
            'rating' => $this->rating,
            'admin_rating' => $this->admin_rating,
            'is_admin_rating' => $this->is_admin_rating,
            'likes_count' => $this->likes_count,
            'dislikes_count' => $this->dislikes_count,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'modified_at' => $this->modified_at,
            'modified_by' => $this->modified_by,
            'width' => $this->width,
            'height' => $this->height,
            'length' => $this->length,
            'weight' => $this->weight,
            'admin_likes' => $this->admin_likes,
            'admin_dislikes' => $this->admin_dislikes,
            'left_zero' => $this->left_zero,
            'leftover' => $this->leftover,
            'volume' => $this->volume,
            'quantity_in_one_place' => $this->quantity_in_one_place,
            'activity_month' => $this->activity_month,
            'sort' => $this->sort,
        ]);

        $query->andFilterWhere(['like', 'alias', $this->alias])
            ->andFilterWhere(['like', 'langs', $this->langs])
            ->andFilterWhere(['like', 'article', $this->article])
            ->andFilterWhere(['like', 'product_type', $this->product_type])
            ->andFilterWhere(['like', 'url', $this->url])
            ->andFilterWhere(['like', 'price_formation_type', $this->price_formation_type])
            ->andFilterWhere(['like', 'defult_visibility_status', $this->defult_visibility_status])
            ->andFilterWhere(['like', 'created_ip', $this->created_ip])
            ->andFilterWhere(['like', 'modified_ip', $this->modified_ip])
            ->andFilterWhere(['like', 'getcourse_url', $this->getcourse_url]);

        return $dataProvider;
    }
}
