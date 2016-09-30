<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\object\models\Object */

$this->title = $model->objectType->name . ': ' . $model->name;

$props = $model->objectType
	->getObjectProperties()
	->select(['label' => 'name', 'value' => 'id', 'datatype_id'])
	->asArray()
	->all();

foreach ($props as &$prop) {
	$prop['value'] = @$model->getObjectPropertyVals()
		->andWhere(['property_id' => $prop['value']])
		->one()
		->val;
	// Очеловечим вывод булевских динамических свойств
	if(array_pop($prop) == 3) { //['datatype_id'] popped
		$prop['format'] = 'boolean';
	}
}
?>
<div class="object-view">

	<h1><?= Html::encode($this->title) ?></h1>

	<p>
		<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Delete', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Are you sure you want to delete this item?',
				'method' => 'post',
			],
		]) ?>
	</p>

	<?= DetailView::widget([
		'model' => $model,
		'attributes' => array_merge([
			'id',
			'created_by:date',
			'name',
		], $props)
	]) ?>

</div>
