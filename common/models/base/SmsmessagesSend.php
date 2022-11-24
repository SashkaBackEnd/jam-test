<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "smsmessages_send".
 *
 * @property int $id
 * @property int $smsmessages__id
 * @property int|null $smsconfirmation_types__id
 * @property int $users__id
 * @property string $phone Телефон
 * @property string|null $sending_text Отправляемый текст
 * @property string|null $request_url Зправшиваемый url
 * @property string|null $answer Ответ
 * @property string|null $answer_status Статус ответа
 * @property string|null $sending_indentity
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SmsmessagesSend extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smsmessages_send';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['smsmessages__id', 'phone'], 'required'],
            [['smsmessages__id', 'smsconfirmation_types__id', 'users__id', 'created_by', 'modified_by'], 'integer'],
            [['sending_text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['phone'], 'string', 'max' => 20],
            [['request_url', 'answer'], 'string', 'max' => 200],
            [['answer_status'], 'string', 'max' => 30],
            [['sending_indentity', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smsmessages__id' => 'Smsmessages  ID',
            'smsconfirmation_types__id' => 'Smsconfirmation Types  ID',
            'users__id' => 'Users  ID',
            'phone' => 'Phone',
            'sending_text' => 'Sending Text',
            'request_url' => 'Request Url',
            'answer' => 'Answer',
            'answer_status' => 'Answer Status',
            'sending_indentity' => 'Sending Indentity',
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
     * @return \common\models\base\query\SmsmessagesSendQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SmsmessagesSendQuery(get_called_class());
    }
}
