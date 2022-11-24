<?php

declare(strict_types=1);

namespace api\models;

use common\extensions\BehaviorHelper;
use common\models\base\CalendarEvents as BaseCalendarEvents;
use common\models\base\CalendarEventsLang;
use common\models\base\query\CalendarEventsLangQuery;
use common\models\base\query\CalendarEventsQuery;
use common\components\ActiveQuery;

class CalendarEvents extends BaseCalendarEvents
{
    /**
     * @return array[]
     */
    public function behaviors(): array
    {
        return [
                'author_id' => BehaviorHelper::getBehaviorBy(),
                'author_ip' => BehaviorHelper::getBehaviorIp(),
                'author_timestamp' => BehaviorHelper::getBehaviorAt(),
            ] + parent::behaviors();
    }

    public function getTitle(): ?string
    {
        return $this->lang->title ?? null;
    }

    public function getLink(): ?string
    {
        return $this->lang->link ?? null;
    }

    public function getText(): ?string
    {
        return $this->lang->text ?? null;
    }

    /**
     * Gets query for [[CalendarEventsLang]].
     *
     * @return ActiveQuery|CalendarEventsLangQuery
     */
    public function getLang(): ActiveQuery|CalendarEventsLangQuery
    {
        return $this->hasOne(CalendarEventsLang::className(), ['calendar_events__id' => 'id'])
            ->where([CalendarEventsLang::tableName() . '.lang' => 'ru']);
    }

    /**
     * {@inheritdoc}
     * @return CalendarEventsQuery the active query used by this AR class.
     */
    public static function find(): CalendarEventsQuery
    {
        return new CalendarEventsQuery(get_called_class());
    }
}
