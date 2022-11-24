<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "store_horders_decline".
 *
 * @property int $id
 * @property string|null $decline_at
 * @property int|null $store_horders__id
 * @property int|null $is_declined
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class StoreHordersDecline extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'store_horders_decline';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['decline_at', 'created_at', 'modified_at'], 'safe'],
            [['store_horders__id', 'is_declined', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'required'],
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
            'decline_at' => 'Decline At',
            'store_horders__id' => 'Store Horders  ID',
            'is_declined' => 'Is Declined',
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
     * @return \common\models\base\query\StoreHordersDeclineQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\StoreHordersDeclineQuery(get_called_class());
    }
}
