<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "object_property_val".
 *
 * @property integer $object_id
 * @property integer $property_id
 * @property string $val
 *
 * @property Object $object
 * @property ObjectProperty $property
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
            [['object_id', 'property_id', 'val'], 'required'],
            [['object_id', 'property_id'], 'integer'],
            [['val'], 'string', 'max' => 255],
            [['object_id'], 'exist', 'skipOnError' => true, 'targetClass' => Object::className(), 'targetAttribute' => ['object_id' => 'id']],
            [['property_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjectProperty::className(), 'targetAttribute' => ['property_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'object_id' => 'Object ID',
            'property_id' => 'Property ID',
            'val' => 'Val',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObject()
    {
        return $this->hasOne(Object::className(), ['id' => 'object_id'])->inverseOf('objectPropertyVals');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperty()
    {
        return $this->hasOne(ObjectProperty::className(), ['id' => 'property_id'])->inverseOf('objectPropertyVals');
    }
}
