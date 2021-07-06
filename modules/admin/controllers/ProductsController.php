<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\ModelProducts;
use app\models\ModelTypeProduct;
use app\models\UploadForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\modules\admin\models\ModelProductsSearch;

class ProductsController extends Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

   
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => ModelProducts::find(),
        ]);

        $modelProductsSearch = new ModelProductsSearch();

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'searchModel' => $modelProductsSearch,
        ]);
    }

    
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionCreate()
    {
        
        $model = new ModelProducts();
        $modelUploadForm = new UploadForm();

        if (Yii::$app->request->isPost && $model->load(Yii::$app->request->post())) {
            $modelUploadForm->imageFile = UploadedFile::getInstance($modelUploadForm, 'imageFile');
            $model->image = $modelUploadForm->getPath();
            
            if ($modelUploadForm->upload() && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        $modelTypeProduct = ModelTypeProduct::find()->all();
        $itemsTypeProduct = ArrayHelper::map($modelTypeProduct,'id','title');


        return $this->render('create', [
            'model' => $model,
            'itemsTypeProduct'=> $itemsTypeProduct,
            'modelUploadForm' => $modelUploadForm,
        ]);
    }

    
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelUploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $modelTypeProduct = ModelTypeProduct::find()->all();
        $itemsTypeProduct = ArrayHelper::map($modelTypeProduct,'id','title');

        return $this->render('update', [
            'model' => $model,
            'itemsTypeProduct' => $itemsTypeProduct,
            'modelUploadForm' => $modelUploadForm,
        ]);
    }

    
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    // Удалить все выбранные записи из таблициы продуктов
    public function actionRemoveAllSelected() {
        $model = new ModelProducts();
        $post = Yii::$app->request->post();
        if (!empty($post['selection'])) {
            if(ModelProducts::deleteAll(['in', 'id', $post['selection']])) {
                Yii::$app->session->setFlash('success', "Выбранные товары были удалены");
            }
        } else {
            Yii::$app->session->setFlash('danger', "Выберите хотя бы один товар для удаления");
        }
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = ModelProducts::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
