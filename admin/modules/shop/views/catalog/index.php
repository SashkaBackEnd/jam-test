<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\shop\models\search\Catalog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Catalog', ['create'], ['class' => 'btn btn-success']) ?>
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
                                'label' => 'Название',
                                'attribute' => 'lang.name',
                            ],
                            [
                                'label' => 'Ссылка',
                                'attribute' => 'lang.name',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    $href = Yii::$app->params['domain']['lk'] . $model->url;
                                    return "<a href='{$href}'>{$model->url}</a>";
                                }
                            ],
//                            'parent_id',
                            [
                                'label' => 'Количество товаров',
                                'value' => function ($model) {
                                    return $model->getProducts()->count();
                                }
                            ],
//                            'upline',
//                            'tree_level',
                            //'sort_no',
                            //'sort_order',
                            //'url:url',
                            //'is_content_page',
                            //'is_new',
                            //'attachment__id',
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
