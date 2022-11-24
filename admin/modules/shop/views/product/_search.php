<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\shop\models\search\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row mt-2">
    <div class="col-md-12">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'alias') ?>

    <?= $form->field($model, 'langs') ?>

    <?= $form->field($model, 'article') ?>

    <?= $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'available') ?>

    <?php // echo $form->field($model, 'product_type') ?>

    <?php // echo $form->field($model, 'title_picture__id') ?>

    <?php // echo $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'show_at_home') ?>

    <?php // echo $form->field($model, 'price_formation_type') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'price_max') ?>

    <?php // echo $form->field($model, 'price_client') ?>

    <?php // echo $form->field($model, 'points') ?>

    <?php // echo $form->field($model, 'limit') ?>

    <?php // echo $form->field($model, 'discount_distr') ?>

    <?php // echo $form->field($model, 'discount_client') ?>

    <?php // echo $form->field($model, 'discount_partner') ?>

    <?php // echo $form->field($model, 'is_register') ?>

    <?php // echo $form->field($model, 'currency__id') ?>

    <?php // echo $form->field($model, 'product_special_statuses__id') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'rating') ?>

    <?php // echo $form->field($model, 'admin_rating') ?>

    <?php // echo $form->field($model, 'is_admin_rating') ?>

    <?php // echo $form->field($model, 'likes_count') ?>

    <?php // echo $form->field($model, 'dislikes_count') ?>

    <?php // echo $form->field($model, 'defult_visibility_status') ?>

    <?php // echo $form->field($model, 'created_by') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'created_ip') ?>

    <?php // echo $form->field($model, 'modified_at') ?>

    <?php // echo $form->field($model, 'modified_by') ?>

    <?php // echo $form->field($model, 'modified_ip') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'length') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'admin_likes') ?>

    <?php // echo $form->field($model, 'admin_dislikes') ?>

    <?php // echo $form->field($model, 'left_zero') ?>

    <?php // echo $form->field($model, 'leftover') ?>

    <?php // echo $form->field($model, 'volume') ?>

    <?php // echo $form->field($model, 'quantity_in_one_place') ?>

    <?php // echo $form->field($model, 'activity_month') ?>

    <?php // echo $form->field($model, 'getcourse_url') ?>

    <?php // echo $form->field($model, 'sort') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>
