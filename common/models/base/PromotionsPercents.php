<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "promotions_percents".
 *
 * @property int $id
 * @property int $promotions__id
 * @property int $pv_amount
 * @property float $percent
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PromotionsPercents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'promotions_percents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['promotions__id', 'pv_amount', 'percent'], 'required'],
            [['promotions__id', 'pv_amount', 'created_by', 'modified_by'], 'integer'],
            [['percent'], 'number'],
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
            'promotions__id' => 'Promotions  ID',
            'pv_amount' => 'Pv Amount',
            'percent' => 'Percent',
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
     * @return \common\models\base\query\PromotionsPercentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PromotionsPercentsQuery(get_called_class());
    }
}
