<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "calendar_events_params".
 *
 * @property int $id
 * @property int $type
 * @property int|null $status
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string $langs
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CalendarEventsParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_events_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'langs'], 'required'],
            [['type', 'status', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['created_ip', 'langs', 'modified_ip'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'created_ip' => 'Created Ip',
            'langs' => 'Langs',
            'modified_at' => 'Modified At',
            'modified_by' => 'Modified By',
            'modified_ip' => 'Modified Ip',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\query\CalendarEventsParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CalendarEventsParamsQuery(get_called_class());
    }
}
