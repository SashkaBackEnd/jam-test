<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "calendar_events_lang".
 *
 * @property int $id
 * @property int|null $calendar_events__id
 * @property string|null $title
 * @property string|null $link
 * @property string|null $text
 * @property string|null $lang
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CalendarEventsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_events_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calendar_events__id', 'created_by', 'modified_by'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 500],
            [['link'], 'string', 'max' => 255],
            [['lang'], 'string', 'max' => 3],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calendar_events__id' => 'Calendar Events  ID',
            'title' => 'Title',
            'link' => 'Link',
            'text' => 'Text',
            'lang' => 'Lang',
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
     * @return \common\models\base\query\CalendarEventsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CalendarEventsLangQuery(get_called_class());
    }
}
