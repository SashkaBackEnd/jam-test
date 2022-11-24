<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_type_action_conditions".
 *
 * @property int $id
 * @property int $matrix_type_actions__id
 * @property int $matrix_conditions__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypeActionConditions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_type_action_conditions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_type_actions__id', 'matrix_conditions__id'], 'required'],
            [['matrix_type_actions__id', 'matrix_conditions__id', 'created_by', 'modified_by'], 'integer'],
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
            'matrix_type_actions__id' => 'Matrix Type Actions  ID',
            'matrix_conditions__id' => 'Matrix Conditions  ID',
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
     * @return \common\models\base\query\MatrixTypeActionConditionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypeActionConditionsQuery(get_called_class());
    }
}
