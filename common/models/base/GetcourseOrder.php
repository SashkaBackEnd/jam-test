<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "getcourse_order".
 *
 * @property int $id
 * @property int|null $users__id
 * @property int|null $getcourse_order__id
 * @property int|null $amount
 * @property string|null $type
 * @property int $status 0 - открыт, 1 - подтвержден, 2 - ошибка
 * @property int $created_by
 * @property string $created_at
 * @property string $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class GetcourseOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'getcourse_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'getcourse_order__id', 'amount', 'status', 'created_by', 'modified_by'], 'integer'],
            [['created_by', 'created_at', 'created_ip'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['type', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
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
            'getcourse_order__id' => 'Getcourse Order  ID',
            'amount' => 'Amount',
            'type' => 'Type',
            'status' => 'Status',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\GetcourseOrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\GetcourseOrderQuery(get_called_class());
    }
}
