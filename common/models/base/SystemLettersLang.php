<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "system_letters_lang".
 *
 * @property int $id
 * @property int|null $system_letter__id
 * @property string|null $lang
 * @property string|null $title заголовок письма
 * @property string|null $content текст письма
 * @property string|null $created_at
 * @property string|null $created_ip
 * @property int|null $created_by
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class SystemLettersLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'system_letters_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['system_letter__id', 'created_by', 'modified_by'], 'integer'],
            [['content'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 2],
            [['title'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['system_letter__id', 'lang'], 'unique', 'targetAttribute' => ['system_letter__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'system_letter__id' => 'System Letter  ID',
            'lang' => 'Lang',
            'title' => 'Title',
            'content' => 'Content',
            'created_at' => 'Created At',
            'created_ip' => 'Created Ip',
            'created_by' => 'Created By',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\SystemLettersLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\SystemLettersLangQuery(get_called_class());
    }
}
