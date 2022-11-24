<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "paymentsystem_interkassa_systems_lang".
 *
 * @property int $id
 * @property string $lang
 * @property int $paymentsystem_interkassa_systems__id
 * @property string|null $name
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class PaymentsystemInterkassaSystemsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paymentsystem_interkassa_systems_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang', 'paymentsystem_interkassa_systems__id'], 'required'],
            [['paymentsystem_interkassa_systems__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 255],
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
            'lang' => 'Lang',
            'paymentsystem_interkassa_systems__id' => 'Paymentsystem Interkassa Systems  ID',
            'name' => 'Name',
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
     * @return \common\models\base\query\PaymentsystemInterkassaSystemsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\PaymentsystemInterkassaSystemsLangQuery(get_called_class());
    }
}
