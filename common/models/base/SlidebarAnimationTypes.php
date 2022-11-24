<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebar_animation_types".
 *
 * @property int $id
 * @property string|null $alias
 * @property int $is_show_for_admin Статус анимации: 0 - не показывать администратору, 1 - показывать администратору
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SlidebarAnimationTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebar_animation_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
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
            'is_show_for_admin' => 'Is Show For Admin',
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
     * @return \common\models\base\query\SlidebarAnimationTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarAnimationTypesQuery(get_called_class());
    }
}
