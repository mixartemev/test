<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "object".
 *
 * @property integer $id
 * @property string $created_by
 * @property string $name
 * @property integer $object_type_id
 *
 * @property ObjectType $objectType
 * @property ObjectPropertyVal[] $objectPropertyVals
 * @property ObjectProperty[] $properties
 */
class Object extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by'], 'safe'],
            [['object_type_id'], 'required'],
            [['object_type_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['object_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ObjectType::className(), 'targetAttribute' => ['object_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_by' => 'Created By',
            'name' => 'Name',
            'object_type_id' => 'Object Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectType()
    {
        return $this->hasOne(ObjectType::className(), ['id' => 'object_type_id'])->inverseOf('objects');
    }

    /**
     * @return string
     */
    public function getPropQuantity()
    {
        return $this->getObjectPropertyVals()->count() . ' / ' . $this->objectType->getObjectProperties()->count();
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectPropertyVals()
    {
        return $this->hasMany(ObjectPropertyVal::className(), ['object_id' => 'id'])->inverseOf('object');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProperties()
    {
        return $this->hasMany(ObjectProperty::className(), ['id' => 'property_id'])->viaTable('object_property_val', ['object_id' => 'id']);
    }
}
