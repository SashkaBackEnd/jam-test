<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\finance\models\search\Transaction */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'need_to_confirm') ?>

    <?= $form->field($model, 'is_self_employed') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'debit_wallet_id') ?>

    <?php // echo $form->field($model, 'debit_wallet_type_alias') ?>

    <?php // echo $form->field($model, 'debit_object_alias') ?>

    <?php // echo $form->field($model, 'debit_object_id') ?>

    <?php // echo $form->field($model, 'credit_wallet_id') ?>

    <?php // echo $form->field($model, 'credit_wallet_type_alias') ?>

    <?php // echo $form->field($model, 'credit_object_alias') ?>

    <?php // echo $form->field($model, 'credit_object_id') ?>

    <?php // echo $form->field($model, 'currency_alias') ?>

    <?php // echo $form->field($model, 'date_open') ?>

    <?php // echo $form->field($model, 'date_closed') ?>

    <?php // echo $form->field($model, 'date_decline') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'group_alias') ?>

    <?php // echo $form->field($model, 'spec_alias') ?>

    <?php // echo $form->field($model, 'status_alias') ?>

    <?php // echo $form->field($model, 'is_confirm_system') ?>

    <?php // echo $form->field($model, 'is_confirm_debit_object') ?>

    <?php // echo $form->field($model, 'is_confirm_credit_object') ?>

    <?php // echo $form->field($model, 'is_confirm_admin') ?>

    <?php // echo $form->field($model, 'debit_wallet_credit_before') ?>

    <?php // echo $form->field($model, 'debit_wallet_credit_after') ?>

    <?php // echo $form->field($model, 'debit_wallet_debit_before') ?>

    <?php // echo $form->field($model, 'debit_wallet_debit_after') ?>

    <?php // echo $form->field($model, 'debit_wallet_balance_before') ?>

    <?php // echo $form->field($model, 'debit_wallet_balance_after') ?>

    <?php // echo $form->field($model, 'credit_wallet_credit_before') ?>

    <?php // echo $form->field($model, 'credit_wallet_credit_after') ?>

    <?php // echo $form->field($model, 'credit_wallet_debit_before') ?>

    <?php // echo $form->field($model, 'credit_wallet_debit_after') ?>

    <?php // echo $form->field($model, 'credit_wallet_balance_before') ?>

    <?php // echo $form->field($model, 'credit_wallet_balance_after') ?>

    <?php // echo $form->field($model, 'is_service') ?>

    <?php // echo $form->field($model, 'is_hide_from_user') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <?php // echo $form->field($model, 'redirect_open') ?>

    <?php // echo $form->field($model, 'redirect_confirm') ?>

    <?php // echo $form->field($model, 'redirect_decline') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_ip') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_ip') ?>

    <?php // echo $form->field($model, 'decline_comment') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
