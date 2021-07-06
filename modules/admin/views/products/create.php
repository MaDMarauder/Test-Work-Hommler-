<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModelProducts */

$this->title = 'Create Model Products';
$this->params['breadcrumbs'][] = ['label' => 'Model Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'itemsTypeProduct' => $itemsTypeProduct,
        'modelUploadForm' => $modelUploadForm
    ]) ?>

</div>
