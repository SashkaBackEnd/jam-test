<?php

use admin\modules\lottery\models\TicketGroup;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\modules\lottery\models\search\TicketGroup */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ticket Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Ticket Group', ['create'], ['class' => 'btn btn-success']) ?>
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
                                'label' => 'Дата',
                                'attribute' => 'date',
                            ],
                            [
                                'label' => 'Логин',
                                'attribute' => 'user.username',
                            ],
                            [
                                'label' => 'Билеты',
                                'attribute' => 'group',
                            ],
                            [
                                'label' => 'Тип',
                                'attribute' => 'type',
                                'value' => function (TicketGroup $model) {
                                    return match ($model->type) {
                                        1 => 'Оборот склада',
                                        2 => 'Получение статуса',
                                        3 => 'Рекрутинг'
                                    };
                                },
                                'filter' => [
                                    1 => 'Оборот склада',
                                    2 => 'Получение статуса',
                                    3 => 'Рекрутинг'
                                ],
                                'filterInputOptions' => [
                                    'prompt' => 'Любой',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
//                            'object_id',
//                            'object_alias',
                            //'info',
                            //'created_at',
                            //'created_by',
                            //'created_ip',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',

//                            ['class' => 'hail812\adminlte3\yii\grid\ActionColumn'],
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
