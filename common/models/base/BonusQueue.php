<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "bonus_queue".
 *
 * @property int $id
 * @property int $users__id
 * @property float $amount
 * @property string $bonus_types__alias
 * @property string $objects
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class BonusQueue extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bonus_queue';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'amount', 'bonus_types__alias', 'objects'], 'required'],
            [['users__id', 'created_by', 'modified_by'], 'integer'],
            [['amount'], 'number'],
            [['objects'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['bonus_types__alias'], 'string', 'max' => 255],
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
            'amount' => 'Amount',
            'bonus_types__alias' => 'Bonus Types  Alias',
            'objects' => 'Objects',
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
     * @return \common\models\base\query\BonusQueueQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\BonusQueueQuery(get_called_class());
    }
}
