<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "objects_variables".
 *
 * @property int $id
 * @property string $object_alias
 * @property string $name
 * @property string $type
 * @property string $langs
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ObjectsVariables extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects_variables';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object_alias', 'name', 'type', 'langs'], 'required'],
            [['type'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['object_alias', 'name', 'langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['object_alias', 'name'], 'unique', 'targetAttribute' => ['object_alias', 'name']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object_alias' => 'Object Alias',
            'name' => 'Name',
            'type' => 'Type',
            'langs' => 'Langs',
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
     * @return \common\models\base\query\ObjectsVariablesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ObjectsVariablesQuery(get_called_class());
    }
}
