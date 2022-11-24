<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "calendar_events".
 *
 * @property int $id
 * @property int|null $users__id
 * @property string|null $title
 * @property string|null $link
 * @property int|null $type
 * @property int|null $is_show_all Только для type = 2
 * @property int|null $is_show_structure Показывать ли структуре
 * @property string|null $start
 * @property string|null $start_time
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CalendarEvents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_events';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['users__id', 'type', 'is_show_all', 'is_show_structure', 'created_by', 'modified_by'], 'integer'],
            [['start', 'start_time', 'created_at', 'modified_at'], 'safe'],
            [['title'], 'string', 'max' => 500],
            [['link'], 'string', 'max' => 255],
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
            'users__id' => 'Users  ID',
            'title' => 'Title',
            'link' => 'Link',
            'type' => 'Type',
            'is_show_all' => 'Is Show All',
            'is_show_structure' => 'Is Show Structure',
            'start' => 'Start',
            'start_time' => 'Start Time',
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
     * @return \common\models\base\query\CalendarEventsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CalendarEventsQuery(get_called_class());
    }
}
