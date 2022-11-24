<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "currencies_rate".
 *
 * @property int $id
 * @property string|null $langs
 * @property string $symbol
 * @property string $abbreviation
 * @property int|null $country__id
 * @property int $status
 * @property int $main
 * @property int $marketing
 * @property int $for_guests
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CurrenciesRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currencies_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['symbol', 'abbreviation', 'created_at', 'modified_at'], 'required'],
            [['country__id', 'status', 'main', 'marketing', 'for_guests', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['langs', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['symbol', 'abbreviation'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'langs' => 'Langs',
            'symbol' => 'Symbol',
            'abbreviation' => 'Abbreviation',
            'country__id' => 'Country  ID',
            'status' => 'Status',
            'main' => 'Main',
            'marketing' => 'Marketing',
            'for_guests' => 'For Guests',
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
     * @return \common\models\base\query\CurrenciesRateQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CurrenciesRateQuery(get_called_class());
    }
}
