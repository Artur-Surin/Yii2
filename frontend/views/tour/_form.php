<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Tour $tourModel */
/** @var app\models\TourPrice $priceModel */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tour-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Поля для модели Tour -->
    <?= $form->field($tourModel, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($tourModel, 'description')->textarea(['rows' => 6]) ?>

    <!-- Поля для модели TourPrice -->
    <?= $form->field($priceModel, 'price_adult')->input('number', ['step' => '0.01']) ?>
    <?= $form->field($priceModel, 'price_adult_sale')->input('number', ['step' => '0.01']) ?>
    <?= $form->field($priceModel, 'price_children')->input('number', ['step' => '0.01']) ?>
    <?= $form->field($priceModel, 'price_children_sale')->input('number', ['step' => '0.01']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
