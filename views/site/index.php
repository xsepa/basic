<?php
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Cartridges</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <?php if (Yii::$app->user->can('viewOrder')) : ?>
        <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute('order/index');?>">Сделать хорошо</a></p>
        <?php else: ?>
        
        <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute('order-user/index');?>">Сделать хорошо</a></p>
        <?php endif; ?>        
                
    </div>

    <div class="body-content">

        <div class="row">
            
        </div>

    </div>
</div>