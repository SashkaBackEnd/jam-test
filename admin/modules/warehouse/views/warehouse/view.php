<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\warehouse\models\Warehouse */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Warehouses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <p>
                        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                            'class' => 'btn btn-danger',
                            'data' => [
                                'confirm' => 'Are you sure you want to delete this item?',
                                'method' => 'post',
                            ],
                        ]) ?>
                    </p>
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'id',
                            'number',
                            'war_warehouse_rank__id',
                            'custom_num',
                            'info:ntext',
                            'delivery_price',
                            'phone',
                            'email:email',
                            'skype',
                            'country_id',
                            'region_id',
                            'city_id',
                            'war_type__id',
                            'office',
                            'users__id',
                            'legal_details:ntext',
                            'visibility',
                            'created_at',
                            'created_by',
                            'created_ip',
                            'modified_at',
                            'modified_by',
                            'modified_ip',
                        ],
                    ]) ?>
                </div>
                <!--.col-md-12-->
            </div>
            <!--.row-->
        </div>
        <!--.card-body-->
    </div>
    <!--.card-->
</div>