<?php

use admin\modules\warehouse\models\Warehouse;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\warehouse\models\search\Warehouse */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Warehouses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Warehouse', ['create'], ['class' => 'btn btn-success']) ?>
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
                                'label' => 'Номер склада',
                                'attribute' => 'number',
                            ],
                            [
                                'label' => 'Статус',
                                'attribute' => 'number',
                            ],
                            [
                                'label' => 'Название склада',
                                'attribute' => 'lang.name',
                            ],
                            [
                                'label' => 'Контакты склада',
                                'format' => 'raw',
                                'value' => function (Warehouse $model) {
                                    $row = [];
                                    if ($model->phone) {
                                        $row[] = '<i class="fa fa-phone mr5"></i>'.$model->phone;
                                    }
                                    if ($model->email) {
                                        $row[] = '<i class="fa fa-envelope mr5"></i>'.$model->phone;
                                    }

                                    return !empty($row) ? implode('<br>', $row) : null;
                                }
                            ],
                            [
                                'label' => 'Адрес склада',
                                'format' => 'raw',
                                'value' => function (Warehouse $model) {
                                    $row = [];
                                    ($model->country) and $row[] = 'Страна: ' . $model->country->name;
                                    ($model->region) and $row[] = 'Область: ' . $model->region->name;
                                    ($model->city) and $row[] = 'Город: ' . $model->city->name;
                                    ($model->lang?->adress) and $row[] = 'Адрес: ' . $model->lang->adress;

                                    return !empty($row) ? implode('<br>', $row) : null;
                                },
                            ],
                            [
                                'label' => 'Тип склада',
                                'attribute' => 'war_type__id',
                                'value' => function (Warehouse $model) {
                                    return match ((int)$model->war_type__id) {
                                        1 => 'Поставщик',
                                        2 => 'Склад представительства',
                                        3 => 'Центральный склад'
                                    };
                                },
                                'filter' => [
                                    1 => 'Поставщик',
                                    2 => 'Склад представительства',
                                    3 => 'Центральный склад'
                                ],
                                'filterInputOptions' => [
                                    'prompt' => 'Любой',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Офис',
                                'attribute' => 'office',
                                'format' => 'raw',
                                'value' => function (Warehouse $model) {
                                    return match ($model->office) {
                                        0 => '<i class="fa fa-times font-red"></i>',
                                        1 => '<i class="fa fa-check font-green"></i>',
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
                            [
                                'label' => 'Дата создания склада',
                                'format' => 'date',
                                'value' => function (Warehouse $model) {
                                    return $model->created_at;
                                }
                            ],
//                            'war_warehouse_rank__id',
//                            'custom_num',
                            [
                                'label' => 'Инфо',
                                'attribute' => 'info',
                                'format' => 'ntext',
                            ],
                            //'delivery_price',
                            //'phone',
                            //'email:email',
                            //'skype',
                            //'country_id',
                            //'region_id',
                            //'city_id',
                            //'war_type__id',
                            //'office',
                            //'users__id',
                            //'legal_details:ntext',
                            //'visibility',
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
