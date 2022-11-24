<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "qiwi_service_bills".
 *
 * @property int $id
 * @property string $data
 * @property string $parsed_data
 * @property string $results
 * @property int $date
 * @property int|null $created_by
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $modified_by
 * @property string|null $modified_at
 * @property string|null $modified_ip
 */
class QiwiServiceBills extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qiwi_service_bills';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data', 'parsed_data', 'results', 'date'], 'required'],
            [['id', 'date', 'created_by', 'modified_by'], 'integer'],
            [['data', 'parsed_data', 'results'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'parsed_data' => 'Parsed Data',
            'results' => 'Results',
            'date' => 'Date',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'modified_by' => 'Modified By',
            'modified_at' => 'Modified At',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\QiwiServiceBillsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\QiwiServiceBillsQuery(get_called_class());
    }
}
