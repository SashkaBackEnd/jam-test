<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "currencies_lang".
 *
 * @property int $id
 * @property int|null $currency__id
 * @property string|null $lang
 * @property string|null $name
 * @property string $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CurrenciesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'currencies_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currency__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
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
            'currency__id' => 'Currency  ID',
            'lang' => 'Lang',
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
     * @return \common\models\base\query\CurrenciesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CurrenciesLangQuery(get_called_class());
    }
}
