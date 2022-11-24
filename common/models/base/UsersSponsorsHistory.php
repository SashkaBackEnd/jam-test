<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_sponsors_history".
 *
 * @property int $id
 * @property int|null $user__id
 * @property string|null $username Логин пользователя на момент смены спонсора
 * @property int|null $sponsor__id_before ID спонсора перед изменением
 * @property int|null $sponsor__id_after ID спонсора после изменения
 * @property string|null $upline_before Upline пользователя перед изменением
 * @property string|null $upline_after Upline пользователя после изменения
 * @property int|null $structure_count Количество пользователей в структуре на момент изменения (без учета текущего пользователя)
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersSponsorsHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_sponsors_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'sponsor__id_before', 'sponsor__id_after', 'structure_count', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['username', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['upline_before', 'upline_after'], 'string', 'max' => 4096],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'username' => 'Username',
            'sponsor__id_before' => 'Sponsor  Id Before',
            'sponsor__id_after' => 'Sponsor  Id After',
            'upline_before' => 'Upline Before',
            'upline_after' => 'Upline After',
            'structure_count' => 'Structure Count',
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
     * @return \common\models\base\query\UsersSponsorsHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersSponsorsHistoryQuery(get_called_class());
    }
}
