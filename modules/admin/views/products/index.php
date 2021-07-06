<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Model Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data'], 'action' => Url::to(['/admin/products/remove-all-selected']), 'method' => 'post']); ?>
        <p>
            <?= Html::a('Create Model Products', ['create'], ['class' => 'btn btn-success']) ?>
            <?= Html::button('Remove rows', ['class' => 'btn btn-danger', 'type'=> 'submit']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\CheckboxColumn',],
                ['class' => 'yii\grid\SerialColumn'],
                
                [
                    'attribute' => 'id',
                    'filter' => false
                ],
                [
                    'attribute' => 'type_id',
                    'filter' => false
                ],
                [
                    'attribute' => 'title',
                    'filter' => null
                ],
                [
                    'attribute' => 'SKU',
                    'filter' => null
                ],
                [
                    'attribute' => 'image',
                    'format' => 'html',    
                    'value' => function ($data) {
                        return Html::img(Yii::getAlias('@web').'/'. $data['image'], ['width' => '70px']);
                    },
                ],
                [
                    'attribute' => 'count',
                    'filter' => false
                ],

                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    <?php ActiveForm::end(); ?>


</div>
