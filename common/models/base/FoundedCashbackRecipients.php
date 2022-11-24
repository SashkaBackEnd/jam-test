<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "founded_cashback_recipients".
 *
 * @property int $id
 * @property int $users__id
 * @property int $promotions__id
 * @property float $bonus_percent
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FoundedCashbackRecipients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'founded_cashback_recipients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'promotions__id', 'bonus_percent'], 'required'],
            [['users__id', 'promotions__id', 'created_by', 'modified_by'], 'integer'],
            [['bonus_percent'], 'number'],
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
            'users__id' => 'Users  ID',
            'promotions__id' => 'Promotions  ID',
            'bonus_percent' => 'Bonus Percent',
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
     * @return \common\models\base\query\FoundedCashbackRecipientsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FoundedCashbackRecipientsQuery(get_called_class());
    }
}
