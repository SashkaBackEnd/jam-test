<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "promotions".
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property int $status
 * @property int|null $count_products
 * @property int|null $count_presents
 * @property int|null $cashback
 * @property string|null $date_start
 * @property string|null $date_end
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class Promotions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'type', 'status'], 'required'],
            [['type', 'status', 'count_products', 'count_presents', 'cashback', 'created_by', 'modified_by'], 'integer'],
            [['date_start', 'date_end', 'created_at', 'modified_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'type' => 'Type',
            'status' => 'Status',
            'count_products' => 'Count Products',
            'count_presents' => 'Count Presents',
            'cashback' => 'Cashback',
            'date_start' => 'Date Start',
            'date_end' => 'Date End',
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
     * @return \common\models\base\query\PromotionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PromotionsQuery(get_called_class());
    }
}
