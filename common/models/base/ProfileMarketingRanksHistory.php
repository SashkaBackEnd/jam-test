<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_marketing_ranks_history".
 *
 * @property int $id
 * @property int $users__id
 * @property string|null $marketing_ranks__alias Полученный ранг
 * @property string $assign_type_alias Событие получения ранга
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileMarketingRanksHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_marketing_ranks_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'assign_type_alias'], 'required'],
            [['users__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['marketing_ranks__alias', 'assign_type_alias', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id' => 'Users  ID',
            'marketing_ranks__alias' => 'Marketing Ranks  Alias',
            'assign_type_alias' => 'Assign Type Alias',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\ProfileMarketingRanksHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileMarketingRanksHistoryQuery(get_called_class());
    }
}
