<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "autotranslate".
 *
 * @property int $id
 * @property string|null $category
 * @property int|null $object__id
 * @property string|null $text
 * @property string|null $context
 * @property string|null $path
 * @property string|null $guid
 * @property int $object_type Тип транслита: 1 - статический текст php/html-кода, 2 - статический текст javascript-а, 3 - вручную добавленный текст
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Autotranslate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autotranslate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object__id', 'object_type', 'created_by', 'modified_by'], 'integer'],
            [['path'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['category'], 'string', 'max' => 50],
            [['text'], 'string', 'max' => 1000],
            [['context'], 'string', 'max' => 255],
            [['guid'], 'string', 'max' => 32],
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
            'category' => 'Category',
            'object__id' => 'Object  ID',
            'text' => 'Text',
            'context' => 'Context',
            'path' => 'Path',
            'guid' => 'Guid',
            'object_type' => 'Object Type',
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
     * @return \common\models\base\query\AutotranslateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\AutotranslateQuery(get_called_class());
    }
}
