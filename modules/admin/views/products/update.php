<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModelProducts */

$this->title = 'Update Model Products: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Model Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="model-products-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsTypeProduct' => $itemsTypeProduct,
        'modelUploadForm' => $modelUploadForm,
    ]) ?>

</div>
