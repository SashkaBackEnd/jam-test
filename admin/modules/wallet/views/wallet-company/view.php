<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\wallet\models\Wallet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Wallets', 'url' => ['index']];
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
                            'type_alias',
                            'object_alias',
                            'object_id',
                            'purpose_alias',
                            'currency_alias',
                            'debit',
                            'credit',
                            'debit_unapproved',
                            'credit_unapproved',
                            'balance',
                            'balance_unapproved',
                            'balance_blocked',
                            'is_set_debit_balance_limit',
                            'is_set_credit_balance_limit',
                            'debit_balance_limit',
                            'credit_balance_limit',
                            'status_alias',
                            'payments_system__alias',
                            'is_allowed_to_manage_in',
                            'is_allowed_to_manage_out',
                            'created_at',
                            'modified_at',
                            'modified_by',
                            'modified_ip',
                            'created_by',
                            'created_ip',
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