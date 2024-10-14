<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TourSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $tours app\models\Tour[] */

$this->title = 'Tours';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tour-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tour', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'alias',
            'title',
            'description',
            [
                'label' => 'Price',
                'value' => function ($model) {
                    $price = $model->tourPrice;
                    if ($price) {
                        return $price->price_adult_sale ?: $price->price_adult;
                    }
                    return $model->price; // Если цена не найдена
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
