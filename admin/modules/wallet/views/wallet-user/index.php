<?php

use common\models\User;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel admin\modules\wallet\models\search\WalletUser */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wallets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Create Wallet', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'type_alias',
                            [
                                'label' => 'Пользователь',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    if ($model->owner instanceof User) {
                                        return $model->owner->username . '<br>' . $model->owner->profile?->fio;
                                    }
                                }
                            ],

//                            'object_alias',
//                            'object_id',
                            'purpose_alias',
                            //'currency_alias',
                            'debit',
                            'credit',
                            //'debit_unapproved',
                            //'credit_unapproved',
                            'balance',
                            //'balance_unapproved',
                            //'balance_blocked',
                            //'is_set_debit_balance_limit',
                            //'is_set_credit_balance_limit',
                            //'debit_balance_limit',
                            //'credit_balance_limit',
                            //'status_alias',
                            //'payments_system__alias',
                            //'is_allowed_to_manage_in',
                            //'is_allowed_to_manage_out',
                            //'created_at',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',
                            //'created_by',
                            //'created_ip',

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
