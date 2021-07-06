<?php
    use yii\helpers\Url;
?>
<h1>List Products</h1>


<div class="row">
    <?php foreach($products as $index => $item): ?>
        <div class="card col-md-4">
            <img src="<?=$item['image']?>" class="card-img-top" height="250" width="100%">
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Title: <?=$item['title']?></li>
                    <li class="list-group-item">Count: <?=$item['count']?></li>
                    <li class="list-group-item">SKU: <?=$item['SKU']?></li>
                    <li class="list-group-item">ID: <?=$item['id']?></li>
                </ul>
            </div>
        </div>
    <?php endforeach;?>
</div>
