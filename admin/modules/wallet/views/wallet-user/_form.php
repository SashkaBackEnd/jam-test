<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\wallet\models\Wallet */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="wallet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_id')->textInput() ?>

    <?= $form->field($model, 'purpose_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'currency_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_unapproved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_unapproved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balance')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balance_unapproved')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'balance_blocked')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_set_debit_balance_limit')->textInput() ?>

    <?= $form->field($model, 'is_set_credit_balance_limit')->textInput() ?>

    <?= $form->field($model, 'debit_balance_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_balance_limit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'payments_system__alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_allowed_to_manage_in')->textInput() ?>

    <?= $form->field($model, 'is_allowed_to_manage_out')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_ip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
