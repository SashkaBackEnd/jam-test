<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\search\Verification */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Верификация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Verification', ['create'], ['class' => 'btn btn-success']) ?>
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
                                'label' => 'Логин',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->user?->username;
                                }
                            ],
                            [
                                'label' => 'ФИО',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->user?->profile?->fio;
                                }
                            ],
                            [
                                'label' => 'Статус верификации',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->verificated_status == 3
                                        ? '<i class="fa fa-check text-success"></i>'
                                        : '<i class="fa fa-times text-danger"></i>';
                                }
                            ],
                            [
                                'label' => 'Дата подачи заявки на верификацию',
                                'format' => 'date',
                                'value' => function ($model) {
                                    return $model->created_at;
                                }
                            ],
//                            'start_verificate_process_at',
//                            'complete_verificate_process_at',
//                            'verificated_status',
                            //'verificated_step_1_status',
                            //'verificated_step_2_status',
                            //'verificated_step_3_status',
                            //'complete_verificated_status',
                            //'start_verificate_step_1',
                            //'complete_verificate_step_1',
                            //'start_verificate_step_2',
                            //'complete_verificate_step_2',
                            //'start_verificate_step_3',
                            //'complete_verificate_step_3',
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
