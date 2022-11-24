<?php

use admin\modules\shop\models\Product;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\shop\models\search\Product */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php
                    // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'label' => 'Название',
                                'attribute' => 'lang.name',
                            ],
                            [
                                'label' => 'Тип товара',
                                'value' => function (Product $model) {
                                    return $model->getType_name();
                                }
                            ],
                            [
                                'label' => 'Каталоги',
                                'format' => 'raw',
                                'value' => function (Product $model) {
                                    if (!$model->catalogs) {
                                        return null;
                                    }
                                    $row = [];
                                    foreach ($model->catalogs as $item) {
                                        $row[] = $item->lang->name;
                                    }
                                    return !empty($row) ? implode('<br>', $row) : null;
                                }
                            ],
                            [
                                'label' => 'Статус',
                                'attribute' => 'status',
                                'value' => function (Product $model) {
                                    return match ((int)$model->status) {
                                        0 => 'Активный',
                                        1 => 'Не активный',
                                        2 => 'Удаленный'
                                    };
                                },
                                'filter' => [0 => 'Активный', 1 => 'Не активный', 2 => 'Удаленный'],
                                'filterInputOptions' => [
                                    'prompt' => 'Любой',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Товар на складе',
                                'attribute' => 'available',
                                'value' => function (Product $model) {
                                    return match ((int)$model->available) {
                                        0 => 'В наличии',
                                        1 => 'Нет в наличии',
                                        2 => 'Предзаказ'
                                    };
                                },
                                'filter' => [0 => 'В наличии', 1 => 'Нет в наличии', 2 => 'Предзаказ'],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Выберите наличие - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Особый статус',
                                'attribute' => 'product_special_statuses__id',
                                'value' => function (Product $model) {
                                    return match ((int)$model->product_special_statuses__id) {
                                        1 => 'Новинка',
                                        2 => 'Скидка',
                                        default => ''
                                    };
                                },
                                'filter' => [1 => 'Новинка', 2 => 'Скидка'],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Выберите особый статус - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
//                            'langs',
//                            'article',
                            //'available',
                            //'title_picture__id',
                            //'url:url',
                            //'show_at_home',
                            //'price_formation_type',
                            [
                                'label' => 'Цена',
                                'attribute' => 'price',
                            ],
                            [
                                'label' => 'Баллы',
                                'attribute' => 'points',
                            ],
                            //'price_max',
                            //'price_client',
                            //'limit',
                            //'discount_distr',
                            //'discount_client',
                            //'discount_partner',
                            //'is_register',
                            //'currency__id',
                            //'product_special_statuses__id',
                            //'is_deleted',
                            //'rating',
                            //'admin_rating',
                            //'is_admin_rating',
                            //'likes_count',
                            //'dislikes_count',
                            //'defult_visibility_status',
                            //'created_by',
                            //'created_at',
                            //'created_ip',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',
                            //'width',
                            //'height',
                            //'length',
                            //'weight',
                            //'admin_likes',
                            //'admin_dislikes',
                            //'left_zero',
                            //'leftover',
                            //'volume',
                            //'quantity_in_one_place',
                            //'activity_month',
                            //'getcourse_url:ntext',
                            //'sort',

                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
                        ],
                        'summaryOptions' => ['class' => 'summary mb-2'],
                        'pager' => [
                            'class' => 'yii\bootstrap4\LinkPager',
                        ]
                    ]); ?>


                </div>
                <!--.card-body-->
            </div>
            <!--.card-->
        </div>
        <!--.col-md-12-->
    </div>
    <!--.row-->
</div>
