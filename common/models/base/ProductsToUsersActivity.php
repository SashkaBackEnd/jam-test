<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "products_to_users_activity".
 *
 * @property int $id
 * @property int|null $orders__id
 * @property int|null $products__id
 * @property int|null $users__id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property string|null $status
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ProductsToUsersActivity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products_to_users_activity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orders__id', 'products__id', 'users__id', 'created_by', 'modified_by'], 'integer'],
            [['start_date', 'end_date', 'created_at', 'modified_at'], 'safe'],
            [['status'], 'string'],
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
            'orders__id' => 'Orders  ID',
            'products__id' => 'Products  ID',
            'users__id' => 'Users  ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'status' => 'Status',
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
     * @return \common\models\base\query\ProductsToUsersActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ProductsToUsersActivityQuery(get_called_class());
    }
}
