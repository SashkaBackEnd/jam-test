<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_invoices".
 *
 * @property int $id
 * @property int|null $user__id ID пользователя, которому выставляют счет
 * @property float $amount Сумма счета
 * @property string|null $comment Комментарий по выставлению счета
 * @property int $status Статус обработки счета: 0 - не оплачен, 1 - оплачен, 2 - отменен
 * @property string|null $created_at Время создания записи
 * @property string|null $modified_at Время создания записи
 * @property int|null $modified_by ID веб-пользователя (users.id), который внес изменения
 * @property string|null $modified_ip
 * @property int|null $created_by ID веб-пользователя (users.id), который создал запись
 * @property string|null $created_ip
 */
class FinanceInvoices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_invoices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user__id', 'status', 'modified_by', 'created_by'], 'integer'],
            [['amount'], 'number'],
            [['comment'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['modified_ip', 'created_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user__id' => 'User  ID',
            'amount' => 'Amount',
            'comment' => 'Comment',
            'status' => 'Status',
            'created_at' => 'Created At',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\FinanceInvoicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceInvoicesQuery(get_called_class());
    }
}
