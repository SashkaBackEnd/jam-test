<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\finance\models\Transaction */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
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
                            'need_to_confirm',
                            'is_self_employed',
                            'parent_id',
                            'debit_wallet_id',
                            'debit_wallet_type_alias',
                            'debit_object_alias',
                            'debit_object_id',
                            'credit_wallet_id',
                            'credit_wallet_type_alias',
                            'credit_object_alias',
                            'credit_object_id',
                            'currency_alias',
                            'date_open',
                            'date_closed',
                            'date_decline',
                            'amount',
                            'group_alias',
                            'spec_alias',
                            'status_alias',
                            'is_confirm_system',
                            'is_confirm_debit_object',
                            'is_confirm_credit_object',
                            'is_confirm_admin',
                            'debit_wallet_credit_before',
                            'debit_wallet_credit_after',
                            'debit_wallet_debit_before',
                            'debit_wallet_debit_after',
                            'debit_wallet_balance_before',
                            'debit_wallet_balance_after',
                            'credit_wallet_credit_before',
                            'credit_wallet_credit_after',
                            'credit_wallet_debit_before',
                            'credit_wallet_debit_after',
                            'credit_wallet_balance_before',
                            'credit_wallet_balance_after',
                            'is_service',
                            'is_hide_from_user',
                            'guid',
                            'redirect_open',
                            'redirect_confirm',
                            'redirect_decline',
                            'created_at',
                            'created_by',
                            'created_ip',
                            'modified_at',
                            'modified_by',
                            'modified_ip',
                            'decline_comment',
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