<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "fonts_category_lang".
 *
 * @property int $id
 * @property int|null $fonts_category__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class FontsCategoryLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fonts_category_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fonts_category__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['fonts_category__id', 'lang'], 'unique', 'targetAttribute' => ['fonts_category__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fonts_category__id' => 'Fonts Category  ID',
            'lang' => 'Lang',
            'title' => 'Title',
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
     * @return \common\models\base\query\FontsCategoryLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\FontsCategoryLangQuery(get_called_class());
    }
}
