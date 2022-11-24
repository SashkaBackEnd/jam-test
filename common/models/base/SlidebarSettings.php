<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebar_settings".
 *
 * @property int $id
 * @property int|null $slidebars_carousels__id Тип используемой карусели
 * @property int $allowed_multiple_slidebars Позволить одновременно создать несколько каруселей
 * @property int $allowed_change_animation Разрешить менять вид анимации перехода
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SlidebarSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebar_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slidebars_carousels__id', 'allowed_multiple_slidebars', 'allowed_change_animation', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
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
            'slidebars_carousels__id' => 'Slidebars Carousels  ID',
            'allowed_multiple_slidebars' => 'Allowed Multiple Slidebars',
            'allowed_change_animation' => 'Allowed Change Animation',
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
     * @return \common\models\base\query\SlidebarSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarSettingsQuery(get_called_class());
    }
}
