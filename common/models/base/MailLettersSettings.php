<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "mail_letters_settings".
 *
 * @property int $id
 * @property int $is_distribution_check_email Проверять ли адрес на существование при рассылке
 * @property string|null $root Для команд крона
 * @property int|null $is_cron_create Создание писем для всех пользователей 0 - сразу, 1 - кроном
 * @property int|null $use_queue
 * @property string|null $queue_url
 * @property int $is_client
 * @property int $is_server
 * @property int|null $is_local Отправлять ли письма с localhost, подразумевает, что is_server = 0, is_client = 0
 * @property string|null $address_server
 * @property string|null $db_dns
 * @property string|null $db_user
 * @property string|null $db_password
 * @property int $is_user_confirm
 * @property int|null $counter_crash
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class MailLettersSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'mail_letters_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_distribution_check_email', 'is_cron_create', 'use_queue', 'is_client', 'is_server', 'is_local', 'is_user_confirm', 'counter_crash', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['root'], 'string', 'max' => 500],
            [['queue_url', 'address_server'], 'string', 'max' => 255],
            [['db_dns', 'db_user', 'db_password', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_distribution_check_email' => 'Is Distribution Check Email',
            'root' => 'Root',
            'is_cron_create' => 'Is Cron Create',
            'use_queue' => 'Use Queue',
            'queue_url' => 'Queue Url',
            'is_client' => 'Is Client',
            'is_server' => 'Is Server',
            'is_local' => 'Is Local',
            'address_server' => 'Address Server',
            'db_dns' => 'Db Dns',
            'db_user' => 'Db User',
            'db_password' => 'Db Password',
            'is_user_confirm' => 'Is User Confirm',
            'counter_crash' => 'Counter Crash',
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
     * @return \common\models\base\query\MailLettersSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\MailLettersSettingsQuery(get_called_class());
    }
}
