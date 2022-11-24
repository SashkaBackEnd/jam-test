<?php

use common\models\base\AuthAssignment;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\search\Profile */
/* @var $form yii\widgets\ActiveForm */
?>


<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapse" aria-expanded="false" aria-controls="collapse">
    Фильтры
</button>

<div class="row mt-2">
    <div class="col-md-12 collapse" id="collapse">
        <?php
        $roles = AuthAssignment::find()->leftJoin('AuthItem', 'AuthItem.name = AuthAssignment.itemname')->select('itemname, AuthItem.description')->distinct()->asArray()->all();
        ?>
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'options' => ['class' => 'row']
        ]); ?>

        <div class="col-6">
            <?= $form->field($model, 'username')->label('Логин') ?>

            <?= $form->field($model, 'first_name')->label('Фамилия') ?>

            <?= $form->field($model, 'last_name')->label('Имя') ?>

            <?= $form->field($model, 'second_name')->label('Отчество') ?>

            <div class="form-group">
                <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
                <?= Html::resetButton('Сбросить', ['class' => 'btn btn-outline-secondary']) ?>
            </div>
        </div>
        <div class="col-6">

            <?= $form->field($model, 'sponsor')->label('Логин спонсора') ?>

            <?= $form->field($model, 'role')->dropDownList(ArrayHelper::map($roles, 'itemname', 'description'), ['prompt' => 'Все'])->label('Роль') ?>

            <?= $form->field($model, 'created_at_from')->textInput(['class' => 'form-control'])->label('Дата регистрации от')->widget(DatePicker::classname()) ?>
            
            <?= $form->field($model, 'created_at_to')->textInput(['class' => 'form-control'])->label('Дата регистрации до')->widget(DatePicker::classname()) ?>

            <?= $form->field($model, 'role')->dropDownList([true => 'Да', null => 'Нет'], ['prompt' => 'Все'])->label('Стартовый пакет') ?>
        
        </div>


        <?php ActiveForm::end(); ?>

    </div>
    <!--.col-md-12-->
</div>