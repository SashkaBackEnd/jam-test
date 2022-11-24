<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\order\models\Order */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'is_sync_a')->textInput() ?>

    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users__id')->textInput() ?>

    <?= $form->field($model, 'total_price')->textInput() ?>

    <?= $form->field($model, 'total_points')->textInput() ?>

    <?= $form->field($model, 'total_discount')->textInput() ?>

    <?= $form->field($model, 'user_price')->textInput() ?>

    <?= $form->field($model, 'user_currency')->textInput() ?>

    <?= $form->field($model, 'delivery_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_delivery_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'store_delivery_types__id')->textInput() ?>

    <?= $form->field($model, 'store_pay_types__id')->textInput() ?>

    <?= $form->field($model, 'war_warehouse__id')->textInput() ?>

    <?= $form->field($model, 'delivery_war_warehouse__id')->textInput() ?>

    <?= $form->field($model, 'store_delivery_types_options__id')->textInput() ?>

    <?= $form->field($model, 'currencies_rate__id')->textInput() ?>

    <?= $form->field($model, 'commentary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'is_payed')->textInput() ?>

    <?= $form->field($model, 'is_unregistered_customer')->textInput() ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'second_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country__id')->textInput() ?>

    <?= $form->field($model, 'region__id')->textInput() ?>

    <?= $form->field($model, 'city__id')->textInput() ?>

    <?= $form->field($model, 'zip_code')->textInput() ?>

    <?= $form->field($model, 'district')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apartments')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_commentary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'track_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'additional_field')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'closed_at')->textInput() ?>

    <?= $form->field($model, 'declined_at')->textInput() ?>

    <?= $form->field($model, 'is_from_store')->textInput() ?>

    <?= $form->field($model, 'is_getcourse')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'add_discount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
