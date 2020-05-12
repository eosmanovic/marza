<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proizvodi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
  <div  class="product-header">
    <h1>Proizvodi</h1>
    <div class="right-header">
      <div>
          <?= Html::a('Dodaj Proizvod', ['create'], ['class' => 'btn btn-success']) ?>
      </div>
      <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-list-alt"></span>'), ['pdf/index'], ['class' => 'btn btn-success btn-mobile-position', 'data-toggle' =>"tooltip", 'title'=> "Kreiraj PDF !"]) ?>
      <?= Html::a(Yii::t('app', '<span class="glyphicon glyphicon-ok"></span>'), ['pdf/lock'], ['class' => 'btn btn-success btn-mobile-position', 'data-toggle' =>"tooltip", 'title'=> "Zakljucaj !"]) ?>    
    </div>
  </div>
       <?php Pjax::begin(); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                   'rowOptions' => function ($model) {
                    if ($model->active != '1') {
                        return ['class' => 'alert-for-nicht-aktiv'];
                    }
                },
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    ['label' => 'Artikal',
                       'attribute' => "name",
                       'value' => function ($data){ return $data->name; },
                    ],
                    ['label' => 'Jedinica mjere',
                       'attribute' => "type",
                       'value' => function ($data){ return $data->type; },
                    ],                    
                    ['label' => 'Kolicina',
                       'attribute' => "quantity",
                       'value' => function ($data){ return $data->quantity; },
                    ],
                    ['label' => 'Nabavna cijena',
                       'attribute' => "price",
                       'value' => function ($data){ return $data->price; },
                    ],
                    ['label' => 'Marža %',
                       'attribute' => "ruc",
                       'value' => function ($data){ return $data->ruc; },
                    ],
                    ['label' => 'PDV %',
                       'attribute' => "pdv",
                       'value' => function ($data){ return $data->pdv; },
                    ],
                    ['label' => 'MP cijena',
                       'attribute' => "mp_price",
                       'value' => function ($data){ return $data->mp_price; },
                    ],
                    ['label' => 'Ukupno bez PDV-a',
                       'attribute' => "sum_price_without_pdv",
                       'value' => function ($data){ return $data->sum_price_without_pdv; },
                    ],
                    ['label' => 'Ukupno sa PDV-om',
                       'attribute' => "sum_price_with_padv",
                       'value' => function ($data){ return $data->sum_price_with_padv; },
                    ],
                    ['label' => 'Datum',
                       'attribute' => "date",
                       'value' => function ($data){ return $data->date; },
                    ], 
                    [
                        'format' => 'raw',
                        'label' => '',
                        'value' => function($model, $key, $index, $column) {
                                return Html::a(
                                    '',
                                    Url::to(['update', 'id' => $model->id]), 
                                    [
                                        'id'=>'grid-custom-button',
                                        'data-pjax'=>true,
                                        'action'=>Url::to(['update', 'id' => $model->id]),
                                        'class'=>'btn-edit glyphicon glyphicon-pencil',
                                    ]
                                );
         
                        }
                    ],
                    [
                        'format' => 'raw',
                        'label' => '',
                        'value' => function($model, $key, $index, $column) {
                                return Html::a(
                                    '',
                                    Url::to(['delete', 'id' => $model->id]), 
                                    [
                                        'id'=>'grid-custom-button',
                                        'data-pjax'=>true,
                                        'action'=>Url::to(['delete', 'id' => $model->id]),
                                        'class'=>'btn-delete glyphicon glyphicon-trash',
                                        'data' => [
                                            'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                         
                        }
                    ],

                ],
                'tableOptions' => [
                    'id' => 'theDatatable',
                    'class'=>'table table-striped table-bordered table-grid-view table-grid-view-customers'
                ],
            ]); ?>
        <?php Pjax::end(); ?>
</div>
