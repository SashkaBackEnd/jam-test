<?php

namespace common\models\base\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\SlidebarFrames]].
 *
 * @see \common\models\base\SlidebarFrames
 */
class SlidebarFramesQuery extends \common\components\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\base\SlidebarFrames[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\base\SlidebarFrames|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
