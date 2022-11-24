<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\order\models\search\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'is_sync_a') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 'users__id') ?>

    <?= $form->field($model, 'total_price') ?>

    <?php // echo $form->field($model, 'total_points') ?>

    <?php // echo $form->field($model, 'total_discount') ?>

    <?php // echo $form->field($model, 'user_price') ?>

    <?php // echo $form->field($model, 'user_currency') ?>

    <?php // echo $form->field($model, 'delivery_price') ?>

    <?php // echo $form->field($model, 'user_delivery_price') ?>

    <?php // echo $form->field($model, 'store_delivery_types__id') ?>

    <?php // echo $form->field($model, 'store_pay_types__id') ?>

    <?php // echo $form->field($model, 'war_warehouse__id') ?>

    <?php // echo $form->field($model, 'delivery_war_warehouse__id') ?>

    <?php // echo $form->field($model, 'store_delivery_types_options__id') ?>

    <?php // echo $form->field($model, 'currencies_rate__id') ?>

    <?php // echo $form->field($model, 'commentary') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_payed') ?>

    <?php // echo $form->field($model, 'is_unregistered_customer') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'second_name') ?>

    <?php // echo $form->field($model, 'country__id') ?>

    <?php // echo $form->field($model, 'region__id') ?>

    <?php // echo $form->field($model, 'city__id') ?>

    <?php // echo $form->field($model, 'zip_code') ?>

    <?php // echo $form->field($model, 'district') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'street') ?>

    <?php // echo $form->field($model, 'apartments') ?>

    <?php // echo $form->field($model, 'admin_commentary') ?>

    <?php // echo $form->field($model, 'track_number') ?>

    <?php // echo $form->field($model, 'additional_field') ?>

    <?php // echo $form->field($model, 'closed_at') ?>

    <?php // echo $form->field($model, 'declined_at') ?>

    <?php // echo $form->field($model, 'is_from_store') ?>

    <?php // echo $form->field($model, 'is_getcourse') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_ip') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_ip') ?>

    <?php // echo $form->field($model, 'add_discount') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
