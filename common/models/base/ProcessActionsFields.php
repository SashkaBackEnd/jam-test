<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "process_actions_fields".
 *
 * @property int $id
 * @property int $process_actions__id
 * @property string $alias Псевдоним поля
 * @property string $field_type Тип поля
 * @property int|null $is_required
 * @property string|null $source_class Класс источника для поля
 * @property string|null $source_method Метод источника для поля
 * @property string $typeof Тип поля
 * @property int|null $is_comparison Доступны ли операции сравнения
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProcessActionsFields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'process_actions_fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['process_actions__id', 'alias', 'field_type'], 'required'],
            [['process_actions__id', 'is_required', 'is_comparison', 'created_by', 'modified_by'], 'integer'],
            [['field_type', 'typeof'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias'], 'string', 'max' => 50],
            [['source_class'], 'string', 'max' => 255],
            [['source_method', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['process_actions__id', 'alias'], 'unique', 'targetAttribute' => ['process_actions__id', 'alias']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'process_actions__id' => 'Process Actions  ID',
            'alias' => 'Alias',
            'field_type' => 'Field Type',
            'is_required' => 'Is Required',
            'source_class' => 'Source Class',
            'source_method' => 'Source Method',
            'typeof' => 'Typeof',
            'is_comparison' => 'Is Comparison',
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
     * @return \common\models\base\query\ProcessActionsFieldsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProcessActionsFieldsQuery(get_called_class());
    }
}
