<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "object_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Object[] $objects
 * @property ObjectProperty[] $objectProperties
 */
class ObjectType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'object_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjects()
    {
        return $this->hasMany(Object::className(), ['object_type_id' => 'id'])->inverseOf('objectType');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getObjectProperties()
    {
        return $this->hasMany(ObjectProperty::className(), ['id' => 'object_property_id'])->viaTable('object_type_object_property', ['object_type_id' => 'id']);
    }
}
