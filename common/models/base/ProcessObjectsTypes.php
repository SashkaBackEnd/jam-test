<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_objects_types".
 *
 * @property int $id
 * @property string $type_alias Псевдоним
 * @property string|null $class Класс обработчик
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessObjectsTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_objects_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_alias'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_by', 'modified_by'], 'integer'],
            [['type_alias'], 'string', 'max' => 50],
            [['class', 'description'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['type_alias', 'class'], 'unique', 'targetAttribute' => ['type_alias', 'class']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_alias' => 'Type Alias',
            'class' => 'Class',
            'description' => 'Description',
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
     * @return \common\models\base\query\ProcessObjectsTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessObjectsTypesQuery(get_called_class());
    }
}
