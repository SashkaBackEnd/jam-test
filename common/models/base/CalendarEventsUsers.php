<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "calendar_events_users".
 *
 * @property int $id
 * @property int|null $calendar_events__id
 * @property int $users__id
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CalendarEventsUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_events_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['calendar_events__id', 'users__id', 'created_by', 'modified_by'], 'integer'],
            [['users__id'], 'required'],
            [['created_at', 'modified_at'], 'safe'],
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
            'users__id' => 'Users  ID',
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
     * @return \common\models\base\query\CalendarEventsUsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CalendarEventsUsersQuery(get_called_class());
    }
}
