<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_conditions_params".
 *
 * @property int $id
 * @property int $matrix_conditions__id
 * @property int $matrix_params__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixConditionsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_conditions_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_conditions__id', 'matrix_params__id'], 'required'],
            [['matrix_conditions__id', 'matrix_params__id', 'created_by', 'modified_by'], 'integer'],
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
            'matrix_conditions__id' => 'Matrix Conditions  ID',
            'matrix_params__id' => 'Matrix Params  ID',
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
     * @return \common\models\base\query\MatrixConditionsParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixConditionsParamsQuery(get_called_class());
    }
}
