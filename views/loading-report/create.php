<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoadingReport */

$this->title = 'Create Loading Report';
$this->params['breadcrumbs'][] = ['label' => 'Loading Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loading-report-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
