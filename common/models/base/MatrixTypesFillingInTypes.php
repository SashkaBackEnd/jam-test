<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "matrix_types_filling_in_types".
 *
 * @property int $id
 * @property string|null $alias
 * @property string $langs
 * @property string|null $class
 * @property string|null $method
 * @property int $is_show_for_admin
 * @property string|null $module_owner
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MatrixTypesFillingInTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'matrix_types_filling_in_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['langs'], 'required'],
            [['is_show_for_admin', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'langs', 'class', 'method', 'module_owner', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['alias'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'langs' => 'Langs',
            'class' => 'Class',
            'method' => 'Method',
            'is_show_for_admin' => 'Is Show For Admin',
            'module_owner' => 'Module Owner',
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
     * @return \common\models\base\query\MatrixTypesFillingInTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MatrixTypesFillingInTypesQuery(get_called_class());
    }
}
