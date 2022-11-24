<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "calendar_events_params_lang".
 *
 * @property int $id
 * @property string $lang
 * @property int|null $calendar_events_params__id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $created_at
 * @property int|null $created_by
 * @property string|null $created_ip
 * @property string|null $modified_at
 * @property int|null $modified_by
 * @property string|null $modified_ip
 */
class CalendarEventsParamsLang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'calendar_events_params_lang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lang'], 'required'],
            [['calendar_events_params__id', 'created_by', 'modified_by'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['lang'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 255],
            [['created_ip', 'modified_ip'], 'string', 'max' => 100],
            [['calendar_events_params__id', 'lang'], 'unique', 'targetAttribute' => ['calendar_events_params__id', 'lang']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lang' => 'Lang',
            'calendar_events_params__id' => 'Calendar Events Params  ID',
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
     * @return \common\models\base\query\CalendarEventsParamsLangQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\base\query\CalendarEventsParamsLangQuery(get_called_class());
    }
}
