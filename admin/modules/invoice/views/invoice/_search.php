<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\invoice\models\search\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'number') ?>

    <?= $form->field($model, 'delivery_price') ?>

    <?= $form->field($model, 'war_statement__id_in') ?>

    <?= $form->field($model, 'war_statement__id_out') ?>

    <?php // echo $form->field($model, 'object_alias_to') ?>

    <?php // echo $form->field($model, 'object_id_to') ?>

    <?php // echo $form->field($model, 'object_alias_from') ?>

    <?php // echo $form->field($model, 'object_id_from') ?>

    <?php // echo $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'point') ?>

    <?php // echo $form->field($model, 'amount_delivery') ?>

    <?php // echo $form->field($model, 'status__id') ?>

    <?php // echo $form->field($model, 'status_chage_date') ?>

    <?php // echo $form->field($model, 'type__id') ?>

    <?php // echo $form->field($model, 'horder__id') ?>

    <?php // echo $form->field($model, 'storekeeper__id') ?>

    <?php // echo $form->field($model, 'is_request') ?>

    <?php // echo $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'notes') ?>

    <?php // echo $form->field($model, 'attachments') ?>

    <?php // echo $form->field($model, 'telegram_info') ?>

    <?php // echo $form->field($model, 'queue_update_products') ?>

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
