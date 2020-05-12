<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Type;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label("Naziv Proizvoda") ?>

    <?= $form->field($model, 'quantity')->textInput(['maxlength' => true])->label("Kolicina") ?>

    <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(Type::find()->all(),'name','name'), ['prompt' => 'Odaberi jedinicu mjere']) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true])->label("Nabavna cijena") ?>

    <?= $form->field($model, 'mp_price')->textInput(['maxlength' => true])->label("Maloprodajna cijena") ?>

    <?= $form->field($model, 'pdv')->textInput(['maxlength' => true])->label("PDV") ?>

    <div class="form-group">
        <?= Html::submitButton('Snimi', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
