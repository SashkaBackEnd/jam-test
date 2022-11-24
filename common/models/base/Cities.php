<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "cities".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $alpha_2 ISO 3166-1 alpha-2
 * @property int $parent_id
 * @property string $sort_order
 * @property int $type
 * @property int $tid
 * @property string $code
 * @property int|null $sort_no
 * @property float|null $sprite_position
 * @property int|null $city_id
 * @property int|null $region_id
 * @property int|null $country_id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Cities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'sort_order', 'type', 'tid', 'code'], 'required'],
            [['parent_id', 'type', 'tid', 'sort_no', 'city_id', 'region_id', 'country_id', 'created_by', 'modified_by'], 'integer'],
            [['sprite_position'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'alpha_2'], 'string', 'max' => 10],
            [['sort_order'], 'string', 'max' => 4096],
            [['code', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'alpha_2' => 'Alpha 2',
            'parent_id' => 'Parent ID',
            'sort_order' => 'Sort Order',
            'type' => 'Type',
            'tid' => 'Tid',
            'code' => 'Code',
            'sort_no' => 'Sort No',
            'sprite_position' => 'Sprite Position',
            'city_id' => 'City ID',
            'region_id' => 'Region ID',
            'country_id' => 'Country ID',
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
     * @return \common\models\base\query\CitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CitiesQuery(get_called_class());
    }
}
