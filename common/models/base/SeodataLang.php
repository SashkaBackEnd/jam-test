<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "seodata_lang".
 *
 * @property int $id
 * @property int|null $seodata__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $description
 * @property string|null $robots
 * @property string|null $keywords
 * @property string|null $metatitle
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SeodataLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'seodata_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['seodata__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['title', 'description', 'metatitle', 'created_ip', 'modified_ip'], 'string', 'max' => 255],
            [['robots'], 'string', 'max' => 50],
            [['keywords'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'seodata__id' => 'Seodata  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'description' => 'Description',
            'robots' => 'Robots',
            'keywords' => 'Keywords',
            'metatitle' => 'Metatitle',
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
     * @return \common\models\base\query\SeodataLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SeodataLangQuery(get_called_class());
    }
}
