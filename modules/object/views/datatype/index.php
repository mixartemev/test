<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Datatypes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="datatype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Datatype', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'class' => 'yii\grid\ActionColumn',
                'buttons' => ['view' => function(){return false;}]
            ]
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
