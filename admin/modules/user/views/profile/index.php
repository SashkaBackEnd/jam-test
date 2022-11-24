<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\user\models\search\Profile */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <?= Html::a('Создать профиль', ['create'], ['class' => 'btn btn-success']) ?>
                        </div>
                    </div>


                    <?php
                    echo $this->render('_search', ['model' => $searchModel]); ?>
                    
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        // 'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            [
                                'label' => 'Пользователь',
                                'format' => 'raw',
                                'attribute' => 'username',
                                'value' => function ($model) {
                                    return $model->user->username . ' '. $model->fio;
                                }
                            ],
                            [
                                'label' => 'Контактные данные',
                                'format' => 'raw',
                                'value' => function ($model) {
                                    return $model->user->email . '<br>' . $model->phone;
                                }
                            ],
                            [
                                'label' => 'Спонсор',
                                'format' => 'raw',
                                'attribute' => 'sponsor',
                                'value' => function ($model) {
                                    return $model->sponsor?->username . '<br>' . $model->sponsor?->profile->fio;
                                }
                            ],
                            [
                                'label' => 'Роль',
                                'format' => 'raw',
                                'attribute' => 'role',
                                'value' => function ($model) {
                                    return $model->role?->itemname;
                                },
                                'filter' => [
                                    'Admin' => 'Admin',
                                    'Buyer' => 'Buyer',
                                    'BlockedUserByAdmin' => 'BlockedUserByAdmin'
                                ],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Все записи - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Стартовый пакет',
                                'format' => 'raw',
                                'attribute' => 'start_package',
                                'value' => function ($model) {
                                    return $model->user->startPackage
                                        ? '<i class="fa fa-check text-success"></i>'
                                        : '<i class="fa fa-times text-danger"></i>';
                                },
                                'filter' => [
                                    true => 'Да',
                                    false => 'Нет'
                                ],
                                'filterInputOptions' => [
                                    'prompt' => ' - - Все записи - - ',
                                    'class' => 'form-control',
                                    'id' => null
                                ]
                            ],
                            [
                                'label' => 'Дата окончания активности',
                                'format' => 'date',
                                'value' => function ($model) {
                                    return $model->user->getDateEndActivity()?->format('Y-m-d');
                                }
                            ],
//                            'users_register_statuses__id',
//                            'sponsor__id',
                            //'sponsors_blogger__id',
                            //'upline',
                            //'tree_level',
                            //'profile_statuses_alias',
                            //'firstline_count',
                            //'structure_count',
                            //'attachment__id',
                            //'phone',
                            //'skype',
                            //'birthday',
                            //'sex',
                            //'series_passport',
                            //'taxpayer_identification_number',
                            //'bank_name',
                            //'checking_account',
                            //'bik_number',
                            //'country__id',
                            //'region__id',
                            //'city__id',
                            //'passport_country__id',
                            //'passport_region__id',
                            //'passport_city__id',
                            //'zip_code',
                            //'is_confirm_email:email',
                            //'new_email:email',
                            //'is_recovery_password',
                            //'profile_type',
                            //'second_email:email',
                            //'lang__id',
                            //'website',
                            //'company_name',
                            //'company_register_number',
                            //'tax_number',
                            //'contact_person',
                            //'users_register_social__id',
                            //'social_id',
                            //'social_name',
                            //'is_blocked_user',
                            //'langs',
                            //'sponsor_selection_option__alias',
                            //'getcourse_uid',
                            //'a_is_connect',
                            //'a_id',
                            //'a_token',
                            //'a_db_id',
                            //'a_connect_date',
                            //'created_at',
                            //'created_by',
                            //'created_ip',
                            //'modified_at',
                            //'modified_by',
                            //'modified_ip',
                            //'verification_id',

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
