<?php

use yii\bootstrap4\Html;

/**
 * @var mixed $currencies
 * @var mixed $countCurrencies
 */

$n = 0;

?>
<ul class="nav">
    <li class="nav-item dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
           aria-expanded="false"><?= Yii::$app->getFormatter()->currencyCode ?></a>
        <div class="dropdown-menu">
            <?php
            foreach ($currencies as $currency) {
                $n++;
                if (Yii::$app->getFormatter()->currencyCode == $currency->code) {
                    echo Html::tag('span', $currency->code, ['class' => 'dropdown-item active']);
                } else {
                    echo Html::a(
                        $currency->code,
                        ['/currency/change', 'currency' => $currency->code],
                        ['class' => 'dropdown-item']
                    );
                }
            }
            ?>
        </div>
    </li>
</ul>
