<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "calendar_events_notify".
 *
 * @property int $id
 * @property int $event_id
 * @property int $user_id
 */
class CalendarEventsNotify extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_events_notify';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_id', 'user_id'], 'required'],
            [['event_id', 'user_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'event_id' => 'Event ID',
            'user_id' => 'User ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\CalendarEventsNotifyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CalendarEventsNotifyQuery(get_called_class());
    }
}
