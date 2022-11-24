<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "news_types_lang".
 *
 * @property int $id
 * @property int|null $news_types__id
 * @property string|null $lang
 * @property string|null $name Название типа
 * @property string|null $description Описание типа
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class NewsTypesLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_types_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['news_types__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 500],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['news_types__id', 'lang'], 'unique', 'targetAttribute' => ['news_types__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'news_types__id' => 'News Types  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'description' => 'Description',
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
     * @return \common\models\base\query\NewsTypesLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\NewsTypesLangQuery(get_called_class());
    }
}
