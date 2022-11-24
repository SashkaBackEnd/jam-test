<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "fonts".
 *
 * @property int $id
 * @property int|null $fonts_writing__id
 * @property int|null $fonts_category__id
 * @property string|null $title
 * @property string|null $path
 * @property int|null $is_used
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Fonts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fonts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fonts_writing__id', 'fonts_category__id', 'is_used', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['path'], 'string', 'max' => 1000],
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
            'fonts_writing__id' => 'Fonts Writing  ID',
            'fonts_category__id' => 'Fonts Category  ID',
            'title' => 'Title',
            'path' => 'Path',
            'is_used' => 'Is Used',
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
     * @return \common\models\base\query\FontsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FontsQuery(get_called_class());
    }
}
