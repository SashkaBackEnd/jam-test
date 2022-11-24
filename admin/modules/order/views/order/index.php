<?php

use admin\modules\order\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\order\models\search\Order */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Order', ['create'], ['class' => 'btn btn-success']) ?>
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
//                            'is_sync_a',
                            [
                                'label' => 'Номер',
                                'attribute' => 'num',
                            ],
                            [
                                'label' => 'Логин',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->user?->username;
                                }
                            ],
//                            [
//                                'label' => 'ФИО',
//                                'format' => 'raw',
//                                'value' => function ($model) {
//                                    return $model->user?->profile?->fio;
//                                }
//                            ],
                            [
                                'label' => 'Сумма заказа',
                                'attribute' => 'total_price',
                                'value' => function (Order $model) {
                                    return (float)$model->total_price . ' PV';
                                },
                            ],
                            [
                                'label' => 'Доставка',
                                'attribute' => 'delivery_price',
                                'value' => function (Order $model) {
                                    return (float)$model->delivery_price . ' PV';
                                },
                            ],
                            [
                                'label' => 'Баллы в маркетинг',
                                'attribute' => 'total_points',
                                'value' => function (Order $model) {
                                    return (float)$model->total_points . ' PV';
                                },
                            ],
                            [
                                'label' => 'Дата создания заказа',
                                'attribute' => 'created_at',
                            ],
                            [
                                'label' => 'Статус',
                                'attribute' => 'status',
                            ],
                            [
                                'label' => 'Статус',
                                'attribute' => 'status',
                                'value' => function (Order $model) {
                                    return match ((int)$model->status) {
                                        0 => 'Не оплачен',
                                        1 => 'В обработке',
                                        2 => 'Доставка',
                                        3 => 'Выполненный',
                                        4 => 'Отклоненный',
                                        5 => 'Доставлен',
                                        50 => 'Удалён',
                                    };
                                },
                                'filter' => [
                                    0 => 'Не оплачен',
                                    1 => 'В обработке',
                                    2 => 'Доставка',
                                    3 => 'Выполненный',
                                    4 => 'Отклоненный',
                                    5 => 'Доставлен',
                                    50 => 'Удалён',
                                ],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Все записи - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Оплачено',
                                'attribute' => 'is_payed',
                                'format' => 'raw',
                                'value' => function (Order $model) {
                                    return match ((int)$model->is_payed) {
                                        0 => '<i class="fa fa-check font-green"></i>',
                                        1 => '<i class="fa fa-times font-red"></i>',
                                    };
                                },
                                'filter' => [
                                    0 => 'Не оплачен',
                                    1 => 'Оплачен',
                                ],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Все записи - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
//                            'users__id',
                            //'total_points',
                            //'total_discount',
                            //'user_price',
                            //'user_currency',
                            //'delivery_price',
                            //'user_delivery_price',
                            //'store_delivery_types__id',
                            //'store_pay_types__id',
                            //'war_warehouse__id',
                            //'delivery_war_warehouse__id',
                            //'store_delivery_types_options__id',
                            //'currencies_rate__id',
                            //'commentary:ntext',
                            //'status',
                            //'is_payed',
                            //'is_unregistered_customer',
                            //'first_name',
                            //'last_name',
                            //'second_name',
                            //'country__id',
                            //'region__id',
                            //'city__id',
                            //'zip_code',
                            //'district',
                            //'phone',
                            //'address',
                            //'street',
                            //'apartments',
                            //'admin_commentary:ntext',
                            //'track_number',
                            //'additional_field',
                            //'closed_at',
                            //'declined_at',
                            //'is_from_store',
                            //'is_getcourse',
                            //'created_at',
                            //'created_by',
                            //'created_ip',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',
                            //'add_discount',

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
