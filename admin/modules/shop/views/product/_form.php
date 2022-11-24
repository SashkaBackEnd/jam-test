<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\shop\models\Product */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'langs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'article')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'available')->textInput() ?>

    <?= $form->field($model, 'product_type')->dropDownList([ 'material' => 'Material', 'package' => 'Package', 'kit' => 'Kit', 'start_package' => 'Start package', 'activate' => 'Activate', 'getcourse_api' => 'Getcourse api', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'title_picture__id')->textInput() ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_at_home')->textInput() ?>

    <?= $form->field($model, 'price_formation_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_max')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price_client')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'points')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'limit')->textInput() ?>

    <?= $form->field($model, 'discount_distr')->textInput() ?>

    <?= $form->field($model, 'discount_client')->textInput() ?>

    <?= $form->field($model, 'discount_partner')->textInput() ?>

    <?= $form->field($model, 'is_register')->textInput() ?>

    <?= $form->field($model, 'currency__id')->textInput() ?>

    <?= $form->field($model, 'product_special_statuses__id')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->textInput() ?>

    <?= $form->field($model, 'rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_rating')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_admin_rating')->textInput() ?>

    <?= $form->field($model, 'likes_count')->textInput() ?>

    <?= $form->field($model, 'dislikes_count')->textInput() ?>

    <?= $form->field($model, 'defult_visibility_status')->dropDownList([ 'avaliable' => 'Avaliable', 'visible' => 'Visible', 'hidden' => 'Hidden', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'width')->textInput() ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'length')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_likes')->textInput() ?>

    <?= $form->field($model, 'admin_dislikes')->textInput() ?>

    <?= $form->field($model, 'left_zero')->textInput() ?>

    <?= $form->field($model, 'leftover')->textInput() ?>

    <?= $form->field($model, 'volume')->textInput() ?>

    <?= $form->field($model, 'quantity_in_one_place')->textInput() ?>

    <?= $form->field($model, 'activity_month')->textInput() ?>

    <?= $form->field($model, 'getcourse_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'sort')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
