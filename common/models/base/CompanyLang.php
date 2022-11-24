<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "company_lang".
 *
 * @property int $id
 * @property int|null $company__id
 * @property string|null $lang
 * @property string $title
 * @property string|null $description
 * @property string|null $address
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CompanyLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company__id', 'created_by', 'modified_by'], 'integer'],
            [['title'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['description'], 'string', 'max' => 1000],
            [['address'], 'string', 'max' => 500],
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
            'title' => 'Title',
            'description' => 'Description',
            'address' => 'Address',
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
     * @return \common\models\base\query\CompanyLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CompanyLangQuery(get_called_class());
    }
}
