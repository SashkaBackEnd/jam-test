<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "qualifications".
 *
 * @property int $id
 * @property int $sort_no
 * @property string $alias
 * @property string $name
 * @property int $is_package Оплачен стартовый пакет
 * @property int $is_business_place Оплачено бизнес-место
 * @property string|null $qualification_alias
 * @property int $qualification_count
 * @property int $gpv_sum НГО
 * @property int $gpv ГО
 * @property string|null $role Роль
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Qualifications extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qualifications';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort_no', 'is_package', 'is_business_place', 'qualification_count', 'gpv_sum', 'gpv', 'created_by', 'modified_by'], 'integer'],
            [['alias', 'name'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'qualification_alias', 'role', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort_no' => 'Sort No',
            'alias' => 'Alias',
            'name' => 'Name',
            'is_package' => 'Is Package',
            'is_business_place' => 'Is Business Place',
            'qualification_alias' => 'Qualification Alias',
            'qualification_count' => 'Qualification Count',
            'gpv_sum' => 'Gpv Sum',
            'gpv' => 'Gpv',
            'role' => 'Role',
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
     * @return \common\models\base\query\QualificationsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\QualificationsQuery(get_called_class());
    }
}
