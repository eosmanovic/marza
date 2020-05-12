<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Update Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Proizvodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Uredi';
?>
<div class="product-update">

    <h1>Ažuriraj proizvod</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
