<?php

namespace common\helpers;

class LanguageHelper
{
    public const LANGUAGE_EN = 'en-EN';
    public const LANGUAGE_RU = 'ru-RU';

    public static $list = [
        'Русский' => self::LANGUAGE_RU,
        'English' => self::LANGUAGE_EN,
    ];
}
