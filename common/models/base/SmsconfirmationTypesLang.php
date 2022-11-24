<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "smsconfirmation_types_lang".
 *
 * @property int $id
 * @property int|null $smsconfirmation_types__id
 * @property string|null $lang
 * @property string $name Название типа
 * @property string|null $description Описание типа
 * @property string|null $text
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SmsconfirmationTypesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'smsconfirmation_types_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['smsconfirmation_types__id', 'created_by', 'modified_by'], 'integer'],
            [['name'], 'required'],
            [['text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 500],
            [['smsconfirmation_types__id', 'lang'], 'unique', 'targetAttribute' => ['smsconfirmation_types__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'smsconfirmation_types__id' => 'Smsconfirmation Types  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
            'text' => 'Text',
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
     * @return \common\models\base\query\SmsconfirmationTypesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SmsconfirmationTypesLangQuery(get_called_class());
    }
}
