<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_constanta_qualification".
 *
 * @property int $id
 * @property int|null $matrix_types__id
 * @property int|null $users__id
 * @property int $is_qualificated
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixConstantaQualification extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_constanta_qualification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_types__id', 'users__id', 'is_qualificated', 'created_by', 'modified_by'], 'integer'],
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
            'users__id' => 'Users  ID',
            'is_qualificated' => 'Is Qualificated',
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
     * @return \common\models\base\query\MatrixConstantaQualificationQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixConstantaQualificationQuery(get_called_class());
    }
}
