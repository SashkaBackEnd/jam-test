<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "ckeditor_plugin_lang".
 *
 * @property int $id
 * @property int|null $ckeditor_plugin__id
 * @property string|null $lang
 * @property string|null $title
 * @property string|null $short_text
 * @property string|null $text
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CkeditorPluginLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ckeditor_plugin_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ckeditor_plugin__id', 'created_by', 'modified_by'], 'integer'],
            [['short_text', 'text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['ckeditor_plugin__id', 'lang'], 'unique', 'targetAttribute' => ['ckeditor_plugin__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ckeditor_plugin__id' => 'Ckeditor Plugin  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'short_text' => 'Short Text',
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
     * @return \common\models\base\query\CkeditorPluginLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CkeditorPluginLangQuery(get_called_class());
    }
}
