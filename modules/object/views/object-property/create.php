<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\object\models\ObjectProperty */

$this->title = 'Create Object Property';
$this->params['breadcrumbs'][] = ['label' => 'Object Properties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="object-property-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
