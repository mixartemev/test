<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\object\models\ObjectProperty */

$this->title = 'Update Object Property: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Object Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="object-property-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
