<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tour $tourModel */
/** @var app\models\TourPrice $priceModel */

$this->title = 'Update Tour: ' . $tourModel->title;
$this->params['breadcrumbs'][] = ['label' => 'Tours', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $tourModel->title, 'url' => ['view', 'id' => $tourModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tour-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'tourModel' => $tourModel,
        'priceModel' => $priceModel,
    ]) ?>

</div>
