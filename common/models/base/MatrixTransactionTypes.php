<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_transaction_types".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int|null $matrix_types__id
 * @property string|null $guid
 * @property string|null $parent_guid
 * @property int|null $rank
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTransactionTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_transaction_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'matrix_types__id', 'rank', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['guid', 'parent_guid'], 'string', 'max' => 32],
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
            'users__id' => 'Users  ID',
            'matrix_types__id' => 'Matrix Types  ID',
            'guid' => 'Guid',
            'parent_guid' => 'Parent Guid',
            'rank' => 'Rank',
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
     * @return \common\models\base\query\MatrixTransactionTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTransactionTypesQuery(get_called_class());
    }
}
