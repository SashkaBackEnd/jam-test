<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebars".
 *
 * @property int $id
 * @property string $alias
 * @property int $is_active Активная карусель (актуально при наличии нескольких каруселей)
 * @property int $is_deleted Удаленная карусель
 * @property int|null $slidebar_animation_types__id
 * @property float $delay_time Время задержки
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Slidebars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alias'], 'required'],
            [['is_active', 'is_deleted', 'slidebar_animation_types__id', 'created_by', 'modified_by'], 'integer'],
            [['delay_time'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
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
            'alias' => 'Alias',
            'is_active' => 'Is Active',
            'is_deleted' => 'Is Deleted',
            'slidebar_animation_types__id' => 'Slidebar Animation Types  ID',
            'delay_time' => 'Delay Time',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\SlidebarsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarsQuery(get_called_class());
    }
}
