<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "office_wallets_transactions_settings".
 *
 * @property int $id
 * @property int $filter_session
 */
class OfficeWalletsTransactionsSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'office_wallets_transactions_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filter_session'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filter_session' => 'Filter Session',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\OfficeWalletsTransactionsSettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\OfficeWalletsTransactionsSettingsQuery(get_called_class());
    }
}
