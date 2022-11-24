<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "faq_categories_lang".
 *
 * @property int $id
 * @property string|null $lang
 * @property int $faq_categories__id идентификатор категории
 * @property string|null $name название категории
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FaqCategoriesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq_categories_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['faq_categories__id'], 'required'],
            [['faq_categories__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 256],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['lang', 'faq_categories__id'], 'unique', 'targetAttribute' => ['lang', 'faq_categories__id']],
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
            'faq_categories__id' => 'Faq Categories  ID',
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
     * @return \common\models\base\query\FaqCategoriesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FaqCategoriesLangQuery(get_called_class());
    }
}
