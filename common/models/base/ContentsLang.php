<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "contents_lang".
 *
 * @property int $id
 * @property int $content__id
 * @property string|null $lang
 * @property string|null $name
 * @property string|null $text
 * @property string|null $clear_text
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class ContentsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contents_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content__id'], 'required'],
            [['content__id', 'created_by', 'modified_by'], 'integer'],
            [['text', 'clear_text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['name', 'created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['content__id', 'lang'], 'unique', 'targetAttribute' => ['content__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content__id' => 'Content  ID',
            'lang' => 'Lang',
            'name' => 'Name',
            'text' => 'Text',
            'clear_text' => 'Clear Text',
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
     * @return \common\models\base\query\ContentsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\ContentsLangQuery(get_called_class());
    }
}
