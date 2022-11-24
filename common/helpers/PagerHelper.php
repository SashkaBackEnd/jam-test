<?php

namespace common\helpers;

/**
 * Класс для настройки и кастомизации Pager
 */
class PagerHelper
{
    /**
     * Дефолтные настройки пагинации
     * @return array
     */
    public static function defaultConfig()
    {
        return [
            'maxButtonCount' => 5,
            'options' => ['class' => 'd-inline-flex border-radius-fl-item mt-4 mb-0 pagination'],
            'firstPageCssClass' => 'page-item',
            'lastPageCssClass' => 'page-item',
            'nextPageCssClass' => 'page-item',
            'prevPageCssClass' => 'page-item',
            'pageCssClass' => 'page-item',
            'firstPageLabel' => '«',
            'prevPageLabel' => '‹',
            'nextPageLabel' => '›',
            'lastPageLabel' => '»',
            'activePageCssClass' => 'active',
            'disabledPageCssClass' => 'disabled',
//            'disableCurrentPageButton' => true,
            'disabledListItemSubTagOptions' => ['class' => 'page-link'],
            'linkOptions' => ['class' => 'page-link'],
        ];
    }
}
