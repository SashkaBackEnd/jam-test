<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\wallet\models\search\WalletUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'type_alias') ?>

    <?= $form->field($model, 'object_alias') ?>

    <?= $form->field($model, 'object_id') ?>

    <?= $form->field($model, 'purpose_alias') ?>

    <?php // echo $form->field($model, 'currency_alias') ?>

    <?php // echo $form->field($model, 'debit') ?>

    <?php // echo $form->field($model, 'credit') ?>

    <?php // echo $form->field($model, 'debit_unapproved') ?>

    <?php // echo $form->field($model, 'credit_unapproved') ?>

    <?php // echo $form->field($model, 'balance') ?>

    <?php // echo $form->field($model, 'balance_unapproved') ?>

    <?php // echo $form->field($model, 'balance_blocked') ?>

    <?php // echo $form->field($model, 'is_set_debit_balance_limit') ?>

    <?php // echo $form->field($model, 'is_set_credit_balance_limit') ?>

    <?php // echo $form->field($model, 'debit_balance_limit') ?>

    <?php // echo $form->field($model, 'credit_balance_limit') ?>

    <?php // echo $form->field($model, 'status_alias') ?>

    <?php // echo $form->field($model, 'payments_system__alias') ?>

    <?php // echo $form->field($model, 'is_allowed_to_manage_in') ?>

    <?php // echo $form->field($model, 'is_allowed_to_manage_out') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_ip') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_ip') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
