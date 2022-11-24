<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "marketing_points_turnover".
 *
 * @property int $id
 * @property int $users__id_recipient Получатель баллов
 * @property int $users__id_initiator За счет кого начислены баллы
 * @property string|null $type тип объема
 * @property string $turnover_object_alias Тип объекта действия (Товары, пакеты, лоты)
 * @property int $turnover_object_id Id объекта действия
 * @property int|null $level С какого уровня начислены баллы
 * @property float $points Баллы
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MarketingPointsTurnover extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marketing_points_turnover';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id_recipient', 'users__id_initiator', 'turnover_object_alias', 'turnover_object_id'], 'required'],
            [['users__id_recipient', 'users__id_initiator', 'turnover_object_id', 'level', 'created_by', 'modified_by'], 'integer'],
            [['type'], 'string'],
            [['points'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['turnover_object_alias'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'users__id_recipient' => 'Users  Id Recipient',
            'users__id_initiator' => 'Users  Id Initiator',
            'type' => 'Type',
            'turnover_object_alias' => 'Turnover Object Alias',
            'turnover_object_id' => 'Turnover Object ID',
            'level' => 'Level',
            'points' => 'Points',
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
     * @return \common\models\base\query\MarketingPointsTurnoverQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MarketingPointsTurnoverQuery(get_called_class());
    }
}
