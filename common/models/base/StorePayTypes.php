<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_pay_types".
 *
 * @property int $id
 * @property string|null $alias
 * @property string|null $name
 * @property int $is_used
 * @property string|null $module
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StorePayTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_pay_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_used', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['alias', 'module', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'is_used' => 'Is Used',
            'module' => 'Module',
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
     * @return \common\models\base\query\StorePayTypesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StorePayTypesQuery(get_called_class());
    }
}
