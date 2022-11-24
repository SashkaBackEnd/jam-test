<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product_packages_assign_log".
 *
 * @property int $id
 * @property int $users__id
 * @property int $product_packages__id
 * @property string $type
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductPackagesAssignLog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_packages_assign_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'product_packages__id', 'type'], 'required'],
            [['users__id', 'product_packages__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['type'], 'string', 'max' => 32],
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
            'product_packages__id' => 'Product Packages  ID',
            'type' => 'Type',
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
     * @return \common\models\base\query\ProductPackagesAssignLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductPackagesAssignLogQuery(get_called_class());
    }
}
