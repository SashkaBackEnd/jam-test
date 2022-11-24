<?php

namespace api\interfaces;

use yii\db\ActiveQueryInterface;

interface CountryInterface
{
    public function getCountry(): ActiveQueryInterface;
}
