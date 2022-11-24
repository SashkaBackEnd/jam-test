<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "company_skypes_lang".
 *
 * @property int $id
 * @property int|null $company__id
 * @property string|null $lang
 * @property string|null $value
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CompanySkypesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_skypes_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['value', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company__id' => 'Company  ID',
            'lang' => 'Lang',
            'value' => 'Value',
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
     * @return \common\models\base\query\CompanySkypesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CompanySkypesLangQuery(get_called_class());
    }
}
