<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = 'Create Product';
$this->params['breadcrumbs'][] = ['label' => 'Proizvodi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1>Novi proizvodi</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
