<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\search\Verification */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'users__id') ?>

    <?= $form->field($model, 'start_verificate_process_at') ?>

    <?= $form->field($model, 'complete_verificate_process_at') ?>

    <?= $form->field($model, 'verificated_status') ?>

    <?php // echo $form->field($model, 'verificated_step_1_status') ?>

    <?php // echo $form->field($model, 'verificated_step_2_status') ?>

    <?php // echo $form->field($model, 'verificated_step_3_status') ?>

    <?php // echo $form->field($model, 'complete_verificated_status') ?>

    <?php // echo $form->field($model, 'start_verificate_step_1') ?>

    <?php // echo $form->field($model, 'complete_verificate_step_1') ?>

    <?php // echo $form->field($model, 'start_verificate_step_2') ?>

    <?php // echo $form->field($model, 'complete_verificate_step_2') ?>

    <?php // echo $form->field($model, 'start_verificate_step_3') ?>

    <?php // echo $form->field($model, 'complete_verificate_step_3') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_ip') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_ip') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
