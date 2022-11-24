<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model admin\modules\user\models\Profile */
/* @var $form yii\bootstrap4\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user__id')->textInput() ?>

    <?= $form->field($model, 'guid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users_register_statuses__id')->textInput() ?>

    <?= $form->field($model, 'sponsor__id')->textInput() ?>

    <?= $form->field($model, 'sponsors_blogger__id')->textInput() ?>

    <?= $form->field($model, 'upline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tree_level')->textInput() ?>

    <?= $form->field($model, 'profile_statuses_alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'firstline_count')->textInput() ?>

    <?= $form->field($model, 'structure_count')->textInput() ?>

    <?= $form->field($model, 'attachment__id')->textInput() ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'skype')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'sex')->textInput() ?>

    <?= $form->field($model, 'series_passport')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'taxpayer_identification_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'checking_account')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bik_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country__id')->textInput() ?>

    <?= $form->field($model, 'region__id')->textInput() ?>

    <?= $form->field($model, 'city__id')->textInput() ?>

    <?= $form->field($model, 'passport_country__id')->textInput() ?>

    <?= $form->field($model, 'passport_region__id')->textInput() ?>

    <?= $form->field($model, 'passport_city__id')->textInput() ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_confirm_email')->textInput() ?>

    <?= $form->field($model, 'new_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_recovery_password')->textInput() ?>

    <?= $form->field($model, 'profile_type')->textInput() ?>

    <?= $form->field($model, 'second_email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lang__id')->textInput() ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'company_register_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tax_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact_person')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'users_register_social__id')->textInput() ?>

    <?= $form->field($model, 'social_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'social_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_blocked_user')->textInput() ?>

    <?= $form->field($model, 'langs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sponsor_selection_option__alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'getcourse_uid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_is_connect')->textInput() ?>

    <?= $form->field($model, 'a_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_db_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_connect_date')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'created_by')->textInput() ?>

    <?= $form->field($model, 'created_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'modified_at')->textInput() ?>

    <?= $form->field($model, 'modified_by')->textInput() ?>

    <?= $form->field($model, 'modified_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'verification_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
