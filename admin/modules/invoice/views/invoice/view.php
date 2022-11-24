<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\invoice\models\Invoice */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Invoices', 'url' => ['index']];
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
                            'delivery_price',
                            'war_statement__id_in',
                            'war_statement__id_out',
                            'object_alias_to',
                            'object_id_to',
                            'object_alias_from',
                            'object_id_from',
                            'amount',
                            'point',
                            'amount_delivery',
                            'status__id',
                            'status_chage_date',
                            'type__id',
                            'horder__id',
                            'storekeeper__id',
                            'is_request',
                            'date',
                            'notes:ntext',
                            'attachments:ntext',
                            'telegram_info',
                            'queue_update_products',
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