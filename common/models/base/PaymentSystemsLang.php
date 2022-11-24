<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "payment_systems_lang".
 *
 * @property int $id
 * @property int $payment_systems__id
 * @property string $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $bank_details
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentSystemsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_systems_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_systems__id', 'lang'], 'required'],
            [['payment_systems__id', 'created_by', 'modified_by'], 'integer'],
            [['bank_details'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 200],
            [['payment_systems__id', 'lang'], 'unique', 'targetAttribute' => ['payment_systems__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'payment_systems__id' => 'Payment Systems  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
            'bank_details' => 'Bank Details',
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
     * @return \common\models\base\query\PaymentSystemsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentSystemsLangQuery(get_called_class());
    }
}
