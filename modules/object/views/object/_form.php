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
    $props = $model->objectType->getObjectProperties()->select(['id','name'])->asArray()->all();

    foreach ($props as $prop) {
        $propCond = ['property_id' => $prop['id']];
        $valQuery = $model->getObjectPropertyVals()->andWhere($propCond);
        if(!$varRow = $valQuery->one()){
            $varRow = new ObjectPropertyVal($propCond);
            $varRow->object_id = $model->id;
            $varRow->property_id = $prop['id'];
        }
        $action = $varRow->isNewRecord?'create':'update';
        $form = ActiveForm::begin(['action' => \yii\helpers\Url::toRoute(['object-property-val/'.$action, 'object_id' => $varRow->object_id, 'property_id' => $varRow->property_id])]);
        echo $form->field($varRow, 'object_id')->hiddenInput()->label(false);
        echo $form->field($varRow, 'property_id')->hiddenInput()->label(false);
        echo $form->field($varRow, 'val')->textInput()->label($prop['name']);
        echo Html::submitButton(ucfirst($action), ['class' => $varRow->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
        ActiveForm::end();
    }
    /* Конец DynamicFields */

    ?>

</div>
