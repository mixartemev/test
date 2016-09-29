<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\object\models\ObjectPropertyVal */

$this->title = 'Update Object Property Val: ' . $model->object_id;
$this->params['breadcrumbs'][] = ['label' => 'Object Property Vals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->object_id, 'url' => ['view', 'object_id' => $model->object_id, 'property_id' => $model->property_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="object-property-val-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
