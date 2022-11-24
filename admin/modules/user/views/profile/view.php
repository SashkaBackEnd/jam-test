<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model admin\modules\user\models\Profile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
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
                            'user__id',
                            'guid',
                            'users_register_statuses__id',
                            'sponsor__id',
                            'sponsors_blogger__id',
                            'upline',
                            'tree_level',
                            'profile_statuses_alias',
                            'firstline_count',
                            'structure_count',
                            'attachment__id',
                            'phone',
                            'skype',
                            'birthday',
                            'sex',
                            'series_passport',
                            'taxpayer_identification_number',
                            'bank_name',
                            'checking_account',
                            'bik_number',
                            'country__id',
                            'region__id',
                            'city__id',
                            'passport_country__id',
                            'passport_region__id',
                            'passport_city__id',
                            'zip_code',
                            'is_confirm_email:email',
                            'new_email:email',
                            'is_recovery_password',
                            'profile_type',
                            'second_email:email',
                            'lang__id',
                            'website',
                            'company_name',
                            'company_register_number',
                            'tax_number',
                            'contact_person',
                            'users_register_social__id',
                            'social_id',
                            'social_name',
                            'is_blocked_user',
                            'langs',
                            'sponsor_selection_option__alias',
                            'getcourse_uid',
                            'a_is_connect',
                            'a_id',
                            'a_token',
                            'a_db_id',
                            'a_connect_date',
                            'created_at',
                            'created_by',
                            'created_ip',
                            'modified_at',
                            'modified_by',
                            'modified_ip',
                            'verification_id',
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