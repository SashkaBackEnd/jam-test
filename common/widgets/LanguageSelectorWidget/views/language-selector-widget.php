<?php

use yii\bootstrap4\Html;

/**
 * @var mixed $languages
 * @var mixed $countLanguages
 */
$n = 0;

foreach ($languages as $name => $code) {
    $n++;

    if (Yii::$app->language == $code) {
        echo Html::tag('span', $name);
    } else {
        echo Html::a($name, ['/language/change', 'language' => $code]);
    }

    if ($countLanguages != $n) {
        echo ' | ';
    }
}
