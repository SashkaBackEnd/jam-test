<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_marketing_periods".
 *
 * @property int $id
 * @property int $marketing_periods__id
 * @property int $users__id
 * @property int|null $sponsor__id
 * @property string|null $upline
 * @property int|null $tree_level
 * @property string|null $activity_end Дата окончания активности в текущем периоде
 * @property string|null $marketing_ranks__alias_end Ранг пользователя на конец периода
 * @property string|null $marketing_ranks__alias_accum Ранг пользователя накопленный за период
 * @property float $personal_volume Накопленный за период личный объем
 * @property float $group_volume Накопленный за период групповой объем
 * @property float $left_volume Накопленный за период объем слева, если есть матричная структура "Бинар"
 * @property float $right_volume Накопленный за период объем справа, если есть матричная структура "Бинар"
 * @property float $total_personal_volume Накопленный за все время до конца периода личный объем
 * @property float $total_group_volume Накопленный за все время до конца периода групповой объем
 * @property float $total_left_volume Накопленный за все время до конца периода объем слева, если есть матричная структура "Бинар"
 * @property float $total_right_volume Накопленный за все время до конца периода объем справа, если есть матричная структура "Бинар"
 * @property string|null $pgpv_tree
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileMarketingPeriods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_marketing_periods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['marketing_periods__id', 'users__id'], 'required'],
            [['marketing_periods__id', 'users__id', 'sponsor__id', 'tree_level', 'created_by', 'modified_by'], 'integer'],
            [['activity_end', 'created_at', 'modified_at'], 'safe'],
            [['personal_volume', 'group_volume', 'left_volume', 'right_volume', 'total_personal_volume', 'total_group_volume', 'total_left_volume', 'total_right_volume'], 'number'],
            [['upline'], 'string', 'max' => 4096],
            [['marketing_ranks__alias_end', 'marketing_ranks__alias_accum'], 'string', 'max' => 30],
            [['pgpv_tree'], 'string', 'max' => 12288],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['marketing_periods__id', 'users__id'], 'unique', 'targetAttribute' => ['marketing_periods__id', 'users__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'marketing_periods__id' => 'Marketing Periods  ID',
            'users__id' => 'Users  ID',
            'sponsor__id' => 'Sponsor  ID',
            'upline' => 'Upline',
            'tree_level' => 'Tree Level',
            'activity_end' => 'Activity End',
            'marketing_ranks__alias_end' => 'Marketing Ranks  Alias End',
            'marketing_ranks__alias_accum' => 'Marketing Ranks  Alias Accum',
            'personal_volume' => 'Personal Volume',
            'group_volume' => 'Group Volume',
            'left_volume' => 'Left Volume',
            'right_volume' => 'Right Volume',
            'total_personal_volume' => 'Total Personal Volume',
            'total_group_volume' => 'Total Group Volume',
            'total_left_volume' => 'Total Left Volume',
            'total_right_volume' => 'Total Right Volume',
            'pgpv_tree' => 'Pgpv Tree',
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
     * @return \common\models\base\query\ProfileMarketingPeriodsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileMarketingPeriodsQuery(get_called_class());
    }
}
