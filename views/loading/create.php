<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Loading */

$this->title = 'Create Loading';
$this->params['breadcrumbs'][] = ['label' => 'Loadings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loading-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
