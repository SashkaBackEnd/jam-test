<?php

namespace app\modules\user\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use admin\modules\user\models\Profile as ProfileModel;
use common\models\Order;

/**
 * Profile represents the model behind the search form of `admin\modules\user\models\Profile`.
 */
class Profile extends ProfileModel
{
    public $username;
    public $first_name;
    public $second_name;
    public $last_name;
    public $sponsor;
    public $role;
    public $start_package;
    public $created_at_from;
    public $created_at_to;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user__id', 'users_register_statuses__id', 'sponsor__id', 'sponsors_blogger__id', 'tree_level', 'firstline_count', 'structure_count', 'attachment__id', 'sex', 'country__id', 'region__id', 'city__id', 'passport_country__id', 'passport_region__id', 'passport_city__id', 'is_confirm_email', 'is_recovery_password', 'profile_type', 'lang__id', 'users_register_social__id', 'is_blocked_user', 'a_is_connect', 'created_by', 'modified_by'], 'integer'],
            [['guid', 'username', 'created_at_from', 'created_at_to', 'role', 'start_package', 'first_name', 'second_name', 'last_name',  'sponsor', 'upline', 'profile_statuses_alias', 'phone', 'skype', 'birthday', 'series_passport', 'taxpayer_identification_number', 'bank_name', 'checking_account', 'bik_number', 'zip_code', 'new_email', 'second_email', 'website', 'company_name', 'company_register_number', 'tax_number', 'contact_person', 'social_id', 'social_name', 'langs', 'sponsor_selection_option__alias', 'getcourse_uid', 'a_id', 'a_token', 'a_db_id', 'a_connect_date', 'created_at', 'created_ip', 'modified_at', 'modified_ip', 'verification_id'], 'safe'],
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
        $query = ProfileModel::find();

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

        // join
        $query->joinWith('user')
            ->joinWith('sponsor as sponsor')
            ->joinWith('lang')
            // ->joinWith('user.startPackage')
            ->joinWith('role as role');

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
        ]);

        $query->andFilterWhere(['like', 'guid', $this->guid])
            ->andFilterWhere(['like', 'users.username', $this->username])
            ->andFilterWhere(['like', 'profile_lang.first_name', $this->first_name])
            ->andFilterWhere(['like', 'profile_lang.second_name', $this->second_name])
            ->andFilterWhere(['like', 'profile_lang.last_name', $this->last_name])
            ->andFilterWhere(['like', 'sponsor.username', $this->sponsor])
            ->andFilterWhere(['=', 'role.itemname', $this->role])
            ->andFilterWhere(['>', self::tableName() . '.created_at', $this->created_at_from])
            ->andFilterWhere(['<', self::tableName() . '.created_at', $this->created_at_to]);

        return $dataProvider;
    }
}
