<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "slidebar_animation_types_lang".
 *
 * @property int $id
 * @property int|null $slidebar_animation_types__id
 * @property string|null $lang
 * @property string|null $name Название анимации
 * @property string|null $description Описание анимации
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SlidebarAnimationTypesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slidebar_animation_types_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['slidebar_animation_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['lang', 'slidebar_animation_types__id'], 'unique', 'targetAttribute' => ['lang', 'slidebar_animation_types__id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slidebar_animation_types__id' => 'Slidebar Animation Types  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
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
     * @return \common\models\base\query\SlidebarAnimationTypesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SlidebarAnimationTypesLangQuery(get_called_class());
    }
}
