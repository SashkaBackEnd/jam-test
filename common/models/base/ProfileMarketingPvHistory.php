<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_marketing_pv_history".
 *
 * @property int $id
 * @property int $users__id
 * @property int|null $qualifications__id
 * @property int $is_package Оплачен стартовый пакет
 * @property int $is_business_place Оплачено бизнес-место
 * @property float $gpv ГО
 * @property float $ppv ЛО
 * @property float|null $gpv_sum НГО
 * @property float $pgpv ОЛГ
 * @property int $type
 * @property string|null $activity_end
 * @property string|null $activity_start
 * @property string|null $activity_last
 * @property float|null $activity_pv
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileMarketingPvHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_marketing_pv_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'qualifications__id', 'is_package', 'is_business_place', 'type', 'created_by', 'modified_by'], 'integer'],
            [['gpv', 'ppv', 'gpv_sum', 'pgpv', 'activity_pv'], 'number'],
            [['activity_end', 'activity_start', 'activity_last', 'created_at', 'modified_at'], 'safe'],
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
            'users__id' => 'Users  ID',
            'qualifications__id' => 'Qualifications  ID',
            'is_package' => 'Is Package',
            'is_business_place' => 'Is Business Place',
            'gpv' => 'Gpv',
            'ppv' => 'Ppv',
            'gpv_sum' => 'Gpv Sum',
            'pgpv' => 'Pgpv',
            'type' => 'Type',
            'activity_end' => 'Activity End',
            'activity_start' => 'Activity Start',
            'activity_last' => 'Activity Last',
            'activity_pv' => 'Activity Pv',
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
     * @return \common\models\base\query\ProfileMarketingPvHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileMarketingPvHistoryQuery(get_called_class());
    }
}
