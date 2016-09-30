<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Object Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-type-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Object Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => ['view' => function(){return false;}]
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
