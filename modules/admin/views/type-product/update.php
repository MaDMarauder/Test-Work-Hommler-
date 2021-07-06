<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModelTypeProduct */

$this->title = 'Update Model Type Product: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Model Type Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="model-type-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
