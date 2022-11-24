<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\CalendarEventsUsers]].
 *
 * @see \common\models\base\CalendarEventsUsers
 */
class CalendarEventsUsersQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\CalendarEventsUsers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\CalendarEventsUsers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
