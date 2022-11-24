<?php

use admin\modules\invoice\models\Invoice;
use common\models\User;
use common\models\Warehouse;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\invoice\models\search\Invoice */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Invoices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Invoice', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'label' => 'Номер накладной',
                                'attribute' => 'number',
                            ],
                            [
                                'label' => 'Склад получатель',
                                'attribute' => 'toStorekeeper',
                                'value' => function (Invoice $model) {
                                    if ($model->toStorekeeper instanceof User) {
                                        return $model->toStorekeeper->username;
                                    } elseif ($model->toStorekeeper instanceof Warehouse) {
                                        return $model->toStorekeeper->lang->name;
                                    }
                                    return null;
                                }
                            ],
                            [
                                'label' => 'Склад отправитель',
                                'attribute' => 'fromStorekeeper',
                                'value' => function (Invoice $model) {
                                    if ($model->fromStorekeeper instanceof User) {
                                        return $model->fromStorekeeper->username;
                                    } elseif ($model->fromStorekeeper instanceof Warehouse) {
                                        return $model->fromStorekeeper->lang->name;
                                    }
                                    return null;
                                }
                            ],
                            [
                                'label' => 'Дата создания',
                                'attribute' => 'created_at',
                                'format' => 'date',
                            ],
                            [
                                'label' => 'Склад отправитель',
                                'format' => 'raw',
                                'value' => function (Invoice $model) {
                                    if ($model->storekeeper) {
                                        return $model->storekeeper->profile?->fi . '<br>' . $model->storekeeper->username;
                                    }
                                    return null;
                                }
                            ],
                            [
                                'label' => 'Стоимость, PV',
                                'format' => 'raw',
                                'value' => function (Invoice $model) {
                                    return ($model->amount ?? 0) . ' PV';
                                }
                            ],
                            [
                                'label' => 'Стоимость доставки, PV',
                                'format' => 'raw',
                                'value' => function (Invoice $model) {
                                    return ($model->delivery_price ?? 0) . ' PV';
                                }
                            ],
                            [
                                'label' => 'Тип',
                                'attribute' => 'type__id',
                                'value' => function (Invoice $model) {
                                    return match ((int)$model->type__id) {
                                        1 => 'Поставка',
                                        2 => 'Перемещение',
                                        3 => 'Заказы',
                                        4 => 'Списание',
                                    };
                                },
                                'filter' => [
                                    1 => 'Поставка',
                                    2 => 'Перемещение',
                                    3 => 'Заказы',
                                    4 => 'Списание',
                                ],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Все - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Заказ',
                                'attribute' => 'order.num',
                            ],
                            [
                                'label' => 'ФИО',
                                'attribute' => 'order.fio',
                            ],
                            [
                                'label' => 'Статус',
                                'attribute' => 'status__id',
                                'value' => function (Invoice $model) {
                                    return match ((int)$model->status__id) {
                                        1 => 'Не проведен',
                                        2 => 'В обработке',
                                        3 => 'Готов к отправке',
                                        4 => 'Доставка',
                                        5 => 'Отгружен',
                                        6 => 'Выполнен',
                                        7 => 'Отменен',
                                    };
                                },
                                'filter' => [
                                    1 => 'Не проведен',
                                    2 => 'В обработке',
                                    3 => 'Готов к отправке',
                                    4 => 'Доставка',
                                    5 => 'Отгружен',
                                    6 => 'Выполнен',
                                    7 => 'Отменен',
                                ],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Все - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
//                            'delivery_price',
//                            'war_statement__id_in',
//                            'war_statement__id_out',
                            //'object_alias_to',
                            //'object_id_to',
                            //'object_alias_from',
                            //'object_id_from',
                            //'amount',
                            //'point',
                            //'amount_delivery',
                            //'status__id',
                            //'status_chage_date',
                            //'type__id',
                            //'horder__id',
                            //'storekeeper__id',
                            //'is_request',
                            //'date',
                            //'notes:ntext',
                            //'attachments:ntext',
                            //'telegram_info',
                            //'queue_update_products',
                            //'created_at',
                            //'created_by',
                            //'created_ip',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',

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
