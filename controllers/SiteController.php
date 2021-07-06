<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ModelProducts;
use app\models\ModelTypeProduct;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    

    public function actionIndex()
    {
        $products = ModelProducts::find()->asArray()->all();
        $categories = ModelTypeProduct::find()->asArray()->all();


        return $this->render('index', [
            'products' => $products,
        ]);
    }

    

}
