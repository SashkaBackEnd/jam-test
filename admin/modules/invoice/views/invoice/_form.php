<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\invoice\models\Invoice */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="invoice-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'delivery_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'war_statement__id_in')->textInput() ?>

    <?= $form->field($model, 'war_statement__id_out')->textInput() ?>

    <?= $form->field($model, 'object_alias_to')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_id_to')->textInput() ?>

    <?= $form->field($model, 'object_alias_from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'object_id_from')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'point')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount_delivery')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status__id')->textInput() ?>

    <?= $form->field($model, 'status_chage_date')->textInput() ?>

    <?= $form->field($model, 'type__id')->textInput() ?>

    <?= $form->field($model, 'horder__id')->textInput() ?>

    <?= $form->field($model, 'storekeeper__id')->textInput() ?>

    <?= $form->field($model, 'is_request')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'notes')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'attachments')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'telegram_info')->textInput() ?>

    <?= $form->field($model, 'queue_update_products')->textInput() ?>

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
