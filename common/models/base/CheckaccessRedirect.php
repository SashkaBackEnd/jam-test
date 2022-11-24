<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "checkaccess_redirect".
 *
 * @property int $id
 * @property string|null $itemname
 * @property string|null $url
 * @property string|null $message_text
 * @property string|null $message_type
 * @property int|null $sort_no
 * @property int $is_active
 * @property int $is_guest_redirect Действия с неавторизованным пользователем: 0 - отправить на авторизацию (стандартное поведение), 1 - редирект на указанный url
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CheckaccessRedirect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checkaccess_redirect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sort_no', 'is_active', 'is_guest_redirect', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['itemname'], 'string', 'max' => 64],
            [['url'], 'string', 'max' => 200],
            [['message_text'], 'string', 'max' => 500],
            [['message_type'], 'string', 'max' => 30],
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
            'itemname' => 'Itemname',
            'url' => 'Url',
            'message_text' => 'Message Text',
            'message_type' => 'Message Type',
            'sort_no' => 'Sort No',
            'is_active' => 'Is Active',
            'is_guest_redirect' => 'Is Guest Redirect',
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
     * @return \common\models\base\query\CheckaccessRedirectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CheckaccessRedirectQuery(get_called_class());
    }
}
