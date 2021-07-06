<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModelTypeProduct */

$this->title = 'Create Model Type Product';
$this->params['breadcrumbs'][] = ['label' => 'Model Type Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="model-type-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
