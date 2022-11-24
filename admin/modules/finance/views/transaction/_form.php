<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\finance\models\Transaction */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="transaction-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'need_to_confirm')->textInput() ?>

    <?= $form->field($model, 'is_self_employed')->textInput() ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'debit_wallet_id')->textInput() ?>

    <?= $form->field($model, 'debit_wallet_type_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_object_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_object_id')->textInput() ?>

    <?= $form->field($model, 'credit_wallet_id')->textInput() ?>

    <?= $form->field($model, 'credit_wallet_type_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_object_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_object_id')->textInput() ?>

    <?= $form->field($model, 'currency_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_open')->textInput() ?>

    <?= $form->field($model, 'date_closed')->textInput() ?>

    <?= $form->field($model, 'date_decline')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'group_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spec_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_confirm_system')->textInput() ?>

    <?= $form->field($model, 'is_confirm_debit_object')->textInput() ?>

    <?= $form->field($model, 'is_confirm_credit_object')->textInput() ?>

    <?= $form->field($model, 'is_confirm_admin')->textInput() ?>

    <?= $form->field($model, 'debit_wallet_credit_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_wallet_credit_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_wallet_debit_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_wallet_debit_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_wallet_balance_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'debit_wallet_balance_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_wallet_credit_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_wallet_credit_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_wallet_debit_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_wallet_debit_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_wallet_balance_before')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'credit_wallet_balance_after')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_service')->textInput() ?>

    <?= $form->field($model, 'is_hide_from_user')->textInput() ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redirect_open')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redirect_confirm')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'redirect_decline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'decline_comment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
