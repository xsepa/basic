<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadingReport */

$this->title = 'Update Loading Report: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Loading Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="loading-report-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
