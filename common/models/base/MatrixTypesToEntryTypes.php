<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_types_to_entry_types".
 *
 * @property int $id
 * @property int $matrix_types__id
 * @property int $matrix_entry_types__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypesToEntryTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_types_to_entry_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_types__id', 'matrix_entry_types__id'], 'required'],
            [['matrix_types__id', 'matrix_entry_types__id', 'created_by', 'modified_by'], 'integer'],
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
            'matrix_types__id' => 'Matrix Types  ID',
            'matrix_entry_types__id' => 'Matrix Entry Types  ID',
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
     * @return \common\models\base\query\MatrixTypesToEntryTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypesToEntryTypesQuery(get_called_class());
    }
}
