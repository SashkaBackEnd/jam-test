<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\order\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
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
                            'is_sync_a',
                            'num',
                            'users__id',
                            'total_price',
                            'total_points',
                            'total_discount',
                            'user_price',
                            'user_currency',
                            'delivery_price',
                            'user_delivery_price',
                            'store_delivery_types__id',
                            'store_pay_types__id',
                            'war_warehouse__id',
                            'delivery_war_warehouse__id',
                            'store_delivery_types_options__id',
                            'currencies_rate__id',
                            'commentary:ntext',
                            'status',
                            'is_payed',
                            'is_unregistered_customer',
                            'first_name',
                            'last_name',
                            'second_name',
                            'country__id',
                            'region__id',
                            'city__id',
                            'zip_code',
                            'district',
                            'phone',
                            'address',
                            'street',
                            'apartments',
                            'admin_commentary:ntext',
                            'track_number',
                            'additional_field',
                            'closed_at',
                            'declined_at',
                            'is_from_store',
                            'is_getcourse',
                            'created_at',
                            'created_by',
                            'created_ip',
                            'modified_at',
                            'modified_by',
                            'modified_ip',
                            'add_discount',
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