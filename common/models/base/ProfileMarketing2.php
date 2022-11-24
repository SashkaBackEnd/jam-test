<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "profile_marketing2".
 *
 * @property int $id
 * @property int $users__id
 * @property int|null $qualifications__id
 * @property int $is_package Оплачен стартовый пакет
 * @property string|null $package_date
 * @property int $is_business_place Оплачено бизнес-место
 * @property float $gpv ГО
 * @property float $ppv ЛО
 * @property float|null $ppv_week ЛО за неделю
 * @property float|null $gpv_sum НГО
 * @property float $pgpv ОЛГ
 * @property int|null $marketing_packages__id ID пакета из таблицы products
 * @property string|null $marketing_ranks__alias Ранг пользователя
 * @property float $total_personal_volume Накопленный за все время личный объем
 * @property float $total_group_volume Накопленный за все время групповой объем
 * @property float $total_left_volume Накопленный за все время объем слева, если есть матричная структура "Бинар"
 * @property float $total_right_volume Накопленный за все время объем справа, если есть матричная структура "Бинар"
 * @property string|null $activity_end Дата окончания активности
 * @property string|null $activity_start
 * @property string|null $activity_last
 * @property float $activity_pv
 * @property int|null $product_packages__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProfileMarketing2 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile_marketing2';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id'], 'required'],
            [['users__id', 'qualifications__id', 'is_package', 'is_business_place', 'marketing_packages__id', 'product_packages__id', 'created_by', 'modified_by'], 'integer'],
            [['package_date', 'activity_end', 'activity_start', 'activity_last', 'created_at', 'modified_at'], 'safe'],
            [['gpv', 'ppv', 'ppv_week', 'gpv_sum', 'pgpv', 'total_personal_volume', 'total_group_volume', 'total_left_volume', 'total_right_volume', 'activity_pv'], 'number'],
            [['marketing_ranks__alias'], 'string', 'max' => 30],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['users__id'], 'unique'],
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
            'package_date' => 'Package Date',
            'is_business_place' => 'Is Business Place',
            'gpv' => 'Gpv',
            'ppv' => 'Ppv',
            'ppv_week' => 'Ppv Week',
            'gpv_sum' => 'Gpv Sum',
            'pgpv' => 'Pgpv',
            'marketing_packages__id' => 'Marketing Packages  ID',
            'marketing_ranks__alias' => 'Marketing Ranks  Alias',
            'total_personal_volume' => 'Total Personal Volume',
            'total_group_volume' => 'Total Group Volume',
            'total_left_volume' => 'Total Left Volume',
            'total_right_volume' => 'Total Right Volume',
            'activity_end' => 'Activity End',
            'activity_start' => 'Activity Start',
            'activity_last' => 'Activity Last',
            'activity_pv' => 'Activity Pv',
            'product_packages__id' => 'Product Packages  ID',
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
     * @return \common\models\base\query\ProfileMarketing2Query the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProfileMarketing2Query(get_called_class());
    }
}
