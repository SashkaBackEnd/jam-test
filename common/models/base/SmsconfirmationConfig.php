<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "smsconfirmation_config".
 *
 * @property int $id
 * @property int $code_length Длина сообщения
 * @property string|null $text Текст сообщения
 * @property int|null $lifetime
 * @property string|null $sender
 * @property int $trying
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SmsconfirmationConfig extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smsconfirmation_config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code_length'], 'required'],
            [['code_length', 'lifetime', 'trying', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['text', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['sender'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code_length' => 'Code Length',
            'text' => 'Text',
            'lifetime' => 'Lifetime',
            'sender' => 'Sender',
            'trying' => 'Trying',
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
     * @return \common\models\base\query\SmsconfirmationConfigQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SmsconfirmationConfigQuery(get_called_class());
    }
}
