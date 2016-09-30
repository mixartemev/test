<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\object\models\ObjectPropertyVal;

/* @var $this yii\web\View */
/* @var $model app\modules\object\models\Object */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="object-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'object_type_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end();

    /* А вот и DynamicFields */
    /** @var \app\modules\object\models\ObjectProperty $prop */
    foreach ($model->objectType->getObjectProperties()->all() as $prop) {
        $propCond = ['property_id' => $prop->id];
        $valQuery = $model->getObjectPropertyVals()->andWhere($propCond);
        if(!$varRow = $valQuery->one()){
            $varRow = new ObjectPropertyVal($propCond);
        }

        $action = $varRow->isNewRecord ? 'create' : 'update';

        $form = ActiveForm::begin([
            'action' => [
                'object-property-val/'.$action,
                'object_id' => $model->id,
                'property_id' => $prop->id
            ]
        ]);

        echo '<hr>' .
            $form->field($varRow, 'val')
            ->{$prop->datatype_id == 3? 'checkbox': 'textInput'}($prop->datatype_id == 2? ['type' => 'number']: ['label' => false]) // в зависимости от типа свойства генерим разные типы полей
            ->label($prop['name']);
        echo Html::submitButton(ucfirst($action), ['class' => $varRow->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);

        ActiveForm::end();
    }
    /* Конец DynamicFields */
    ?>

</div>
