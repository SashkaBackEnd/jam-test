<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "smsmessage_group_phones".
 *
 * @property int $id
 * @property int $smsmessage_groups__id
 * @property int|null $users__id
 * @property string|null $phone Телефон
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SmsmessageGroupPhones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smsmessage_group_phones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['smsmessage_groups__id'], 'required'],
            [['smsmessage_groups__id', 'users__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['phone'], 'string', 'max' => 30],
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
            'smsmessage_groups__id' => 'Smsmessage Groups  ID',
            'users__id' => 'Users  ID',
            'phone' => 'Phone',
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
     * @return \common\models\base\query\SmsmessageGroupPhonesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SmsmessageGroupPhonesQuery(get_called_class());
    }
}
