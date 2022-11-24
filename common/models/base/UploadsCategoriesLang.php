<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "uploads_categories_lang".
 *
 * @property int $id
 * @property int|null $category__id
 * @property string|null $lang
 * @property string|null $category
 * @property string|null $description
 * @property string|null $key_words
 * @property string|null $seo_descr
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class UploadsCategoriesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uploads_categories_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category__id', 'created_by', 'modified_by'], 'integer'],
            [['description', 'key_words', 'seo_descr'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['category', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category__id' => 'Category  ID',
            'lang' => 'Lang',
            'category' => 'Category',
            'description' => 'Description',
            'key_words' => 'Key Words',
            'seo_descr' => 'Seo Descr',
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
     * @return \common\models\base\query\UploadsCategoriesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\UploadsCategoriesLangQuery(get_called_class());
    }
}
