<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\object\models\Datatype */

$this->title = 'Update Datatype: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Datatypes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="datatype-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
