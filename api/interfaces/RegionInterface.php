<?php

namespace api\interfaces;

use yii\db\ActiveQueryInterface;

interface RegionInterface
{
    public function getRegion(): ActiveQueryInterface;
}
