<?php

use common\models\Company;
use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\modules\finance\models\search\Transaction */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transactions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Transaction', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'label' => 'От кого',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ($model->toOwner instanceof User) {
                                        return $model->toOwner->username . '<br>' . $model->toOwner->profile?->fio;
                                    } elseif ($model->toOwner instanceof Company) {
                                        return $model->toOwner->lang->title;
                                    }
                                    return null;
                                }
                            ],
                            [
                                'label' => 'Кому',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ($model->fromOwner instanceof User) {
                                        return $model->fromOwner->username . '<br>' . $model->fromOwner->profile?->fio;
                                    } elseif ($model->fromOwner instanceof Company) {
                                        return $model->fromOwner->lang->title;
                                    }
                                    return null;
                                }
                            ],
//                            'need_to_confirm',
//                            'is_self_employed',
//                            'parent_id',
//                            'debit_wallet_id',
                            //'debit_wallet_type_alias',
                            //'debit_object_alias',
                            //'debit_object_id',
                            //'credit_wallet_id',
                            //'credit_wallet_type_alias',
                            //'credit_object_alias',
                            //'credit_object_id',
                            //'currency_alias',
                            //'date_open',
                            //'date_closed',
                            //'date_decline',
                            //'amount',
                            //'group_alias',
                            'spec_alias',
                            //'status_alias',
                            //'is_confirm_system',
                            //'is_confirm_debit_object',
                            //'is_confirm_credit_object',
                            //'is_confirm_admin',
                            'debit_wallet_credit_before',
                            //'debit_wallet_credit_after',
                            //'debit_wallet_debit_before',
                            //'debit_wallet_debit_after',
                            //'debit_wallet_balance_before',
                            //'debit_wallet_balance_after',
                            'credit_wallet_credit_before',
                            //'credit_wallet_credit_after',
                            //'credit_wallet_debit_before',
                            //'credit_wallet_debit_after',
                            //'credit_wallet_balance_before',
                            //'credit_wallet_balance_after',
                            //'is_service',
                            //'is_hide_from_user',
                            //'guid',
                            //'redirect_open',
                            //'redirect_confirm',
                            //'redirect_decline',
                            //'created_at',
                            //'created_by',
                            //'created_ip',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',
                            //'decline_comment',

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
