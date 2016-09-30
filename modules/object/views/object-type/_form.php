<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\object\models\ObjectProperty;

/* @var $this yii\web\View */
/* @var $model app\modules\object\models\ObjectType */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-type-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end();

    /* А вот и DynamicFields */
	$dataTypes = \yii\helpers\ArrayHelper::map(\app\modules\object\models\Datatype::find()->all(), 'id', 'name');
    /** @var ObjectProperty $prop */
    foreach ($model->objectProperties as $prop) {
        $form = ActiveForm::begin([
			'action' => [
				'object-property/update',
				'id' => $prop->id
			]
		]);
        echo '<hr>' . $form->field($prop, 'name')->textInput()->label('Динамическое свойство');
        echo $form->field($prop, 'datatype_id')
			->dropDownList($dataTypes)
			->label('Тип');
        echo Html::submitButton('Update', ['class' => 'btn btn-primary']);
        ActiveForm::end();
    }
    /* Конец DynamicFields */
	/* а теперь еще в тип объекта можно добавить новое свойство */
	$form = ActiveForm::begin([
		'action' => [
			'object-property/create',
			'object_type_id' => $model->id
		]
	]);
	$prop = new ObjectProperty();
	echo '<hr>' . $form->field($prop, 'name')->textInput()->label('Динамическое свойство');
	echo $form->field($prop, 'datatype_id')
		->dropDownList($dataTypes)
		->label('Тип');
	echo Html::submitButton('Create', ['class' => 'btn btn-success']);
	ActiveForm::end();
	/* все, добавили */
    ?>

</div>
