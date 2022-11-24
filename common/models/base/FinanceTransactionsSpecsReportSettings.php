<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "finance_transactions_specs_report_settings".
 *
 * @property int $id
 * @property int $finance_transactions_specs__id
 * @property int|null $sort_no
 * @property int|null $direction_type Направление операции: 1 - приход в компанию; 2 - расход компании
 * @property string|null $created_at Дата создания записи. Техническое поле
 * @property int|null $created_by ID ВебПользователя кто создавал запись. Техническое поле
 * @property string|null $created_ip
 * @property string|null $modified_at Дата редактирования записи. Техническое поле
 * @property int|null $modified_by ID ВебПользователя кто вносил изменения. Техническое поле
 * @property string|null $modified_ip
 */
class FinanceTransactionsSpecsReportSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'finance_transactions_specs_report_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['finance_transactions_specs__id', 'sort_no', 'direction_type', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['finance_transactions_specs__id', 'sort_no', 'direction_type'], 'unique', 'targetAttribute' => ['finance_transactions_specs__id', 'sort_no', 'direction_type']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'finance_transactions_specs__id' => 'Finance Transactions Specs  ID',
            'sort_no' => 'Sort No',
            'direction_type' => 'Direction Type',
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
     * @return \common\models\base\query\FinanceTransactionsSpecsReportSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FinanceTransactionsSpecsReportSettingsQuery(get_called_class());
    }
}
