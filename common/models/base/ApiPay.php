<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "api_pay".
 *
 * @property int $id
 * @property string $user
 * @property int $is_package
 * @property float $amount
 * @property int $store_horders__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ApiPay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_pay';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user'], 'required'],
            [['is_package', 'store_horders__id', 'created_by', 'modified_by'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'modified_at'], 'safe'],
            [['user'], 'string', 'max' => 255],
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
            'user' => 'User',
            'is_package' => 'Is Package',
            'amount' => 'Amount',
            'store_horders__id' => 'Store Horders  ID',
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
     * @return \common\models\base\query\ApiPayQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ApiPayQuery(get_called_class());
    }
}
