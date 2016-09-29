<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "object_property_val".
 *
 * @property integer $id
 * @property integer $object_id
 * @property integer $property_id
 * @property string $val
 *
 * @property ObjectProperty $property
 * @property Object $object
 */
class ObjectPropertyVal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_property_val';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['object_id', 'property_id'], 'integer'],
            [['val'], 'required'],
            [['val'], 'string', 'max' => 255],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjectProperty::className(), 'targetAttribute' => ['property_id' => 'id']],
            [['object_id'], 'exist', 'skipOnError' => true, 'targetClass' => Object::className(), 'targetAttribute' => ['object_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object_id' => 'Object ID',
            'property_id' => 'Property ID',
            'val' => 'Val',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(ObjectProperty::className(), ['id' => 'property_id'])->inverseOf('objectPropertyVals');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObject()
    {
        return $this->hasOne(Object::className(), ['id' => 'object_id'])->inverseOf('objectPropertyVals');
    }
}
