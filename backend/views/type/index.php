<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mjerne jedinice';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="type-index">
    <div  class="product-header">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Dodaj mjernu jedinicu', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'id' => 'theDatatable',
            'class'=>'table table-striped table-bordered table-grid-view table-grid-view-customers'
        ],
    ]); ?>
</div>
