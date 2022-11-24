<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_interkassa_transactions".
 *
 * @property int $id
 * @property string|null $ik_shop_id Идентификатор магазина зарегистрированного в системе «INTERKASSA» на который был совершен платеж
 * @property float|null $ik_payment_amount Сумма платежа, которую заплатил покупатель получить от покупателя (с учетом валюты и курса магазина, настраивается в «Настройки магазина»).
 * @property int|null $ik_payment_id В этом поле передается идентификатор покупки в соответствии с системой учета продавца, полученный сервисом с веб-сайта продавца
 * @property string|null $ik_payment_desc Описание товара или услуги. Формируется продавцом. Строка добавляется в назначение платежа
 * @property string|null $ik_paysystem_alias Способ оплаты с помощью которого была произведена оплата покупателем
 * @property string|null $ik_payment_timestamp Дата и время выполнения платежа в UNIX TIMESTAMP формате. UNIX-время или POSIX-время (англ. Unix time) — способ кодирования времени, принятый в UNIX и других POSIX-совместимых операционных системах. 
 * @property string|null $ik_x_guid Гуид финансовой операции
 * @property string|null $ik_payment_state Состояние (статус) платежа проведенного в системе «INTERKASSA». Принимаемые значения: success / fail. (success – платеж принят, fail – платеж не принят)
 * @property string|null $ik_trans_id Номер платежа в системе «INTERKASSA», выполненный в процессе обработки запроса на выполнение платежа сервисом Interkassa Payment Interface. Является уникальным в системе «INTERKASSA»
 * @property string|null $ik_sign Контрольная подпись оповещения о выполнении платежа, которая используется для проверки целостности полученной информации и однозначной идентификации отправителя
 * @property int $is_real Реальный платеж: 0 - платеж через эмуляцию, 1 - реальный платеж
 * @property int $is_confirmed Статус транзакции: 0 - неподтвержденная, 1 - подтвержденная
 * @property string|null $reason Причина отклонения/подтверждения транзакции
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemInterkassaTransactions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_interkassa_transactions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ik_payment_amount'], 'number'],
            [['ik_payment_id', 'is_real', 'is_confirmed', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['ik_shop_id', 'ik_paysystem_alias', 'ik_trans_id'], 'string', 'max' => 50],
            [['ik_payment_desc'], 'string', 'max' => 1000],
            [['ik_payment_timestamp', 'ik_payment_state'], 'string', 'max' => 20],
            [['ik_x_guid'], 'string', 'max' => 32],
            [['ik_sign', 'reason', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ik_shop_id' => 'Ik Shop ID',
            'ik_payment_amount' => 'Ik Payment Amount',
            'ik_payment_id' => 'Ik Payment ID',
            'ik_payment_desc' => 'Ik Payment Desc',
            'ik_paysystem_alias' => 'Ik Paysystem Alias',
            'ik_payment_timestamp' => 'Ik Payment Timestamp',
            'ik_x_guid' => 'Ik X Guid',
            'ik_payment_state' => 'Ik Payment State',
            'ik_trans_id' => 'Ik Trans ID',
            'ik_sign' => 'Ik Sign',
            'is_real' => 'Is Real',
            'is_confirmed' => 'Is Confirmed',
            'reason' => 'Reason',
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
     * @return \common\models\base\query\PaymentsystemInterkassaTransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemInterkassaTransactionsQuery(get_called_class());
    }
}
