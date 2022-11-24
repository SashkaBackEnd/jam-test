<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_tokens_history".
 *
 * @property int $id
 * @property int $matrix_tokens__id_before
 * @property int $matrix_tokens__id_after
 * @property int $users__id
 * @property int|null $with_structure ячейка перемещена со структурой
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTokensHistory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_tokens_history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['matrix_tokens__id_before', 'matrix_tokens__id_after', 'users__id'], 'required'],
            [['matrix_tokens__id_before', 'matrix_tokens__id_after', 'users__id', 'with_structure', 'created_by', 'modified_by'], 'integer'],
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
            'matrix_tokens__id_before' => 'Matrix Tokens  Id Before',
            'matrix_tokens__id_after' => 'Matrix Tokens  Id After',
            'users__id' => 'Users  ID',
            'with_structure' => 'With Structure',
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
     * @return \common\models\base\query\MatrixTokensHistoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTokensHistoryQuery(get_called_class());
    }
}
