<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "object_property".
 *
 * @property integer $id
 * @property string $name
 * @property integer $datatype_id
 *
 * @property Datatype $datatype
 * @property ObjectPropertyVal[] $objectPropertyVals
 * @property ObjectType[] $objectTypes
 */
class ObjectProperty extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_property';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'datatype_id'], 'required'],
            [['datatype_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['datatype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Datatype::className(), 'targetAttribute' => ['datatype_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'datatype_id' => 'Datatype ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatatype()
    {
        return $this->hasOne(Datatype::className(), ['id' => 'datatype_id'])->inverseOf('objectProperties');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectPropertyVals()
    {
        return $this->hasMany(ObjectPropertyVal::className(), ['property_id' => 'id'])->inverseOf('property');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectTypes()
    {
        return $this->hasMany(ObjectType::className(), ['id' => 'object_type_id'])->viaTable('object_type_object_property', ['object_property_id' => 'id']);
    }
}
