<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\user\models\Verification */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="verification-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'users__id')->textInput() ?>

    <?= $form->field($model, 'start_verificate_process_at')->textInput() ?>

    <?= $form->field($model, 'complete_verificate_process_at')->textInput() ?>

    <?= $form->field($model, 'verificated_status')->textInput() ?>

    <?= $form->field($model, 'verificated_step_1_status')->textInput() ?>

    <?= $form->field($model, 'verificated_step_2_status')->textInput() ?>

    <?= $form->field($model, 'verificated_step_3_status')->textInput() ?>

    <?= $form->field($model, 'complete_verificated_status')->textInput() ?>

    <?= $form->field($model, 'start_verificate_step_1')->textInput() ?>

    <?= $form->field($model, 'complete_verificate_step_1')->textInput() ?>

    <?= $form->field($model, 'start_verificate_step_2')->textInput() ?>

    <?= $form->field($model, 'complete_verificate_step_2')->textInput() ?>

    <?= $form->field($model, 'start_verificate_step_3')->textInput() ?>

    <?= $form->field($model, 'complete_verificate_step_3')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_ip')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
