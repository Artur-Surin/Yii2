<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $tourModel app\models\Tour */
/* @var $priceModel app\models\TourPrice */

?>

<div class="tour-create">
    <h1>Создать тур и указать цену</h1>

    <?php $form = ActiveForm::begin(); ?>

    <h3>Данные тура</h3>
    <?= $form->field($tourModel, 'alias')->textInput(['maxlength' => true]) ?>
    <?= $form->field($tourModel, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($tourModel, 'description')->textarea(['rows' => 6]) ?>

    <h3>Цены</h3>
    <?= $form->field($priceModel, 'price_adult')->textInput(['maxlength' => true]) ?>
    <?= $form->field($priceModel, 'price_adult_sale')->textInput(['maxlength' => true]) ?>
    <?= $form->field($priceModel, 'price_children')->textInput(['maxlength' => true]) ?>
    <?= $form->field($priceModel, 'price_children_sale')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

