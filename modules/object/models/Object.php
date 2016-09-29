<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "object".
 *
 * @property integer $id
 * @property string $name
 * @property integer $object_type_id
 *
 * @property ObjectType $objectType
 * @property ObjectPropertyVal[] $objectPropertyVals
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
     * @return \yii\db\ActiveQuery
     */
    public function getObjectPropertyVals()
    {
        return $this->hasMany(ObjectPropertyVal::className(), ['object_id' => 'id'])->inverseOf('object');
    }
}
