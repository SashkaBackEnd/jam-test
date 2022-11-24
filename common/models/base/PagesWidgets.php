<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "pages_widgets".
 *
 * @property int $id
 * @property int|null $pages__id
 * @property string|null $object_alias
 * @property int|null $object_id
 * @property string|null $position
 * @property int|null $sort_no
 * @property int $is_moving Можно ли перемещать объект: 0 - нет, 1 - да
 * @property string|null $css_style Стили для перемещаемого объекта
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PagesWidgets extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages_widgets';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pages__id', 'object_id', 'sort_no', 'is_moving', 'created_by', 'modified_by'], 'integer'],
            [['css_style'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['object_alias', 'position'], 'string', 'max' => 50],
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
            'pages__id' => 'Pages  ID',
            'object_alias' => 'Object Alias',
            'object_id' => 'Object ID',
            'position' => 'Position',
            'sort_no' => 'Sort No',
            'is_moving' => 'Is Moving',
            'css_style' => 'Css Style',
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
     * @return \common\models\base\query\PagesWidgetsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PagesWidgetsQuery(get_called_class());
    }
}
