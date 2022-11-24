<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "users_register_security_params".
 *
 * @property int $id
 * @property int $is_allowed_edit_username Разрешать администратору редактировать логины пользователей: 0 - нет, 1 -да
 * @property int $is_allowed_edit_password Разрешать администратору редактировать пароли пользователей: 0 - нет, 1 -да
 * @property int $is_allowed_edit_finpassword Разрешать администратору редактировать финансовые пароли пользователей: 0 - нет, 1 -да
 * @property int $is_allowed_view_password Разрешать администратору просматривать пароли пользователей: 0 - нет, 1 -да
 * @property int $is_allowed_view_finpassword Разрешать администратору просматривать финансовые пароли пользователей: 0 - нет, 1 -да
 * @property int $is_allowed_change_sponsor Разрешить администратору менять спонсоров пользователям
 * @property int $edit_type_email Тип редактирования Email-а в профиле пользователя: 0 - редактировать как обычное поле, 1 - редактировать с подтверждением, 2 - редактировать с контрольным вопросом
 * @property int $edit_type_password Тип редактирования пароля в профиле пользователя: 0 - редактировать как обычное поле, 1 - редактировать с подтверждением старого пароля, 2 - редактировать с контрольным вопросом
 * @property int $edit_type_finpassword Тип редактирования пароля в профиле пользователя: 0 - редактировать как обычное поле, 1 - редактировать с подтверждением обычного пароля и старого финансового пароля, 2 - редактировать с контрольным вопросом
 * @property int $edit_type_phone Тип редактирования телефона в профиле пользователя: 0 - редактировать как обычное поле, 1 - редактировать с SMS-подтверждением (при установленном модуле AdminSMSMessages)
 * @property int $recovery_type_password
 * @property int $recovery_type_finpassword
 * @property int $recovery_password_field_type Тип поля для восстановления пароля: 1 - логин, 2 - Email, 3 - по логину и email, 4 - по полю указанному в recovery_password_field_custom, 5 - по полю указанному в recovery_password_field_custom и email
 * @property string|null $recovery_password_field_custom Поле для восстановления пароля. Работает только, если recovery_password_field_type = 4 или 5. Формат - таблица|поле|по какому полю связь с таблицей users
 * @property int $password_complexity Проверка пароля на сложность: 0 - нет, 1 -да
 * @property int $additional_password_complexity_enabled Включить дополнительные параметры проверки сложности пароля: 0 - настройка параметров по умолчанию; 1 - включаются дополнительная настройка параметров
 * @property int $minimum_password_length Минимальная длина пароля. Не менее 6 символов
 * @property int $uppercase_required Обязательное использование заглавных букв: 0 - не требуется; 1 - требуется
 * @property int $additional_enabled Включить дополнительные параметры безопасности: 0 - нет, 1 -да, 2 - добавляется сверка IP и браузера с данными при последней удачной авторизации
 * @property int $additional_attempts_till_confirmation Количество попыток до отправки проверочного кода
 * @property int $additional_attempts_till_block Количество попыток до блокирования аккаунта
 * @property int $additional_confirmation_delivery_method Метод получения проверочного кода: 1 - Email, 2 - SMS
 * @property int $additional_confirmation_limit Количество сообщений для пользователя
 * @property int $authentication_type Двухфакторная аутентификация
 * @property int $enable_send_code_email
 * @property int $enable_send_code_sms
 * @property int $enable_send_code_ga
 * @property int $enable_send_code_telegram
 * @property int $confirm_wallet_transaction Подтверждение создания транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UsersRegisterSecurityParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users_register_security_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_allowed_edit_username', 'is_allowed_edit_password', 'is_allowed_edit_finpassword', 'is_allowed_view_password', 'is_allowed_view_finpassword', 'is_allowed_change_sponsor', 'edit_type_email', 'edit_type_password', 'edit_type_finpassword', 'edit_type_phone', 'recovery_type_password', 'recovery_type_finpassword', 'recovery_password_field_type', 'password_complexity', 'additional_password_complexity_enabled', 'minimum_password_length', 'uppercase_required', 'additional_enabled', 'additional_attempts_till_confirmation', 'additional_attempts_till_block', 'additional_confirmation_delivery_method', 'additional_confirmation_limit', 'authentication_type', 'enable_send_code_email', 'enable_send_code_sms', 'enable_send_code_ga', 'enable_send_code_telegram', 'confirm_wallet_transaction', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['recovery_password_field_custom', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_allowed_edit_username' => 'Is Allowed Edit Username',
            'is_allowed_edit_password' => 'Is Allowed Edit Password',
            'is_allowed_edit_finpassword' => 'Is Allowed Edit Finpassword',
            'is_allowed_view_password' => 'Is Allowed View Password',
            'is_allowed_view_finpassword' => 'Is Allowed View Finpassword',
            'is_allowed_change_sponsor' => 'Is Allowed Change Sponsor',
            'edit_type_email' => 'Edit Type Email',
            'edit_type_password' => 'Edit Type Password',
            'edit_type_finpassword' => 'Edit Type Finpassword',
            'edit_type_phone' => 'Edit Type Phone',
            'recovery_type_password' => 'Recovery Type Password',
            'recovery_type_finpassword' => 'Recovery Type Finpassword',
            'recovery_password_field_type' => 'Recovery Password Field Type',
            'recovery_password_field_custom' => 'Recovery Password Field Custom',
            'password_complexity' => 'Password Complexity',
            'additional_password_complexity_enabled' => 'Additional Password Complexity Enabled',
            'minimum_password_length' => 'Minimum Password Length',
            'uppercase_required' => 'Uppercase Required',
            'additional_enabled' => 'Additional Enabled',
            'additional_attempts_till_confirmation' => 'Additional Attempts Till Confirmation',
            'additional_attempts_till_block' => 'Additional Attempts Till Block',
            'additional_confirmation_delivery_method' => 'Additional Confirmation Delivery Method',
            'additional_confirmation_limit' => 'Additional Confirmation Limit',
            'authentication_type' => 'Authentication Type',
            'enable_send_code_email' => 'Enable Send Code Email',
            'enable_send_code_sms' => 'Enable Send Code Sms',
            'enable_send_code_ga' => 'Enable Send Code Ga',
            'enable_send_code_telegram' => 'Enable Send Code Telegram',
            'confirm_wallet_transaction' => 'Confirm Wallet Transaction',
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
     * @return \common\models\base\query\UsersRegisterSecurityParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UsersRegisterSecurityParamsQuery(get_called_class());
    }
}
