<?php

namespace backend\controllers;

use Yii;
use common\models\Product;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Type;
use kartik\mpdf\Pdf;

/**
 * ProductsController implements the CRUD actions for Product model.
 */
class PdfController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $products = Product::find()->where(['active' => 1])->all();
        $date = date("d.m.Y");

        $sum_without_pdv = 0;
        $sum_with_pdv = 0;

        foreach ($products as $key => $product) {

           $sum_without_pdv += $product->sum_price_without_pdv;
           $sum_with_pdv += $product->sum_price_with_padv;
        }


        $css = '.pdf-header{ ol li { font-size: 10px; } }';
        $content = $this->renderPartial('_reportView', ['products' => $products, 'sum_without_pdv' => $sum_without_pdv, 'sum_with_pdv' => $sum_with_pdv, 'date' => $date]);


	    $pdf = new Pdf([
	        // set to use core fonts only
	        'mode' => Pdf::MODE_CORE, 
	        // A4 paper format
	        'format' => Pdf::FORMAT_A4, 
	        // portrait orientation
	        'orientation' => Pdf::ORIENT_LANDSCAPE, 
	        // stream to browser inline
	        'destination' => Pdf::DEST_BROWSER, 
	        // your html content input
	        'content' => $content,  
	        // format content from your own css file if needed or use the
	        // enhanced bootstrap css built by Krajee for mPDF formatting 
	        'cssFile' => '@vendor/kartik-v/yii2-mpdf/src/assets/kv-mpdf-bootstrap.min.css',
	        // any css to be embedded if required
	        'cssInline' => '.kv-heading-1{font-size:18px}', 
	         // set mPDF properties on the fly
	        'options' => ['title' => 'Krajee Report Title'],
	         // call mPDF methods on the fly
	        'methods' => [ 
	            'SetFooter'=>['{PAGENO}'],
	        ]
	    ]);
	    
    // return the pdf output as per the destination setting
        return $pdf->render();
    }

    public function actionLock() {

        $products = Product::find()->all();

        foreach ($products as $key => $product) {

           $product->active = 0;
           $product->save();
        }

        return $this->redirect(['/products/index']);
    }
}
