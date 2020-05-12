<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Type */

$this->title = 'Update Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Mjerne jedinice', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="type-update">

    <h1>Uredi</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
