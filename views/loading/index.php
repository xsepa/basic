<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use app\models\LoadingStatus;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoadingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Loadings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="loading-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
<?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
<?= Html::a('Create Loading', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'date',
            //'user_id',
            'username',
            'loading_order_name',
              [
                'label' => 'loading status',
                'attribute' => 'loading_status_id',
                'value' => 'loadingStatusName',
                'filter' => Html::activeDropDownList($searchModel, 'loading_status_id', ArrayHelper::map(app\models\LoadingStatus::find()->asArray()->all(), 'id', 'loading_status'), ['class' => 'form-control', 'prompt' => 'Select Category']),
            ],
            
            
            //'loading_status_id',
            //'loadingStatusName',
            [
                'class' => \yii\grid\ActionColumn::className(),
                'buttons' => [
                    'close' => function ($url, $model) {
                        if ($model->loading_status_id == LoadingStatus::LOADINGSTATUS_OPEN) {

                            $customurl = Yii::$app->getUrlManager()->createUrl(['loading/close', 'id' => $model['id']]);
                            return \yii\helpers\Html::a('<span class="glyphicon glyphicon-flag"></span>', $customurl,
                                            ['title' => Yii::t('yii', 'Close'), 'data-pjax' => '0']);
                        } else {
                            $customurl = '';
                            return \yii\helpers\Html::a('<span class="glyphicon glyphicon-ok"></span>', $customurl,
                                            ['title' => Yii::t('yii', 'Close'), 'data-pjax' => '0']);
                        }
                    }
                ],
                'template' => '{close}',
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>
</div>
