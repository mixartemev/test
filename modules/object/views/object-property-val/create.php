<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\object\models\ObjectPropertyVal */

$this->title = 'Create Object Property Val';
$this->params['breadcrumbs'][] = ['label' => 'Object Property Vals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-property-val-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
