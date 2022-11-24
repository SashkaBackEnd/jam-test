<?php

namespace api\interfaces;

use yii\db\ActiveQueryInterface;

interface CityInterface
{
    public function getCity(): ActiveQueryInterface;
}
