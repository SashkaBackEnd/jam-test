<?php

namespace common\widgets\LanguageSelectorWidget;

use common\helpers\LanguageHelper;
use yii\base\Widget;

/**
 * Виджет для выбора языка
 */
class LanguageSelectorWidget extends Widget
{
    private $languages;
    private $countLanguages;

    public function init()
    {
        $this->languages = LanguageHelper::$list;
        $this->countLanguages = count($this->languages);
    }

    public function run()
    {
        return $this->render('language-selector-widget', [
            'languages' => $this->languages,
            'countLanguages' => $this->countLanguages,
        ]);
    }
}
