<?php

namespace app\modules\object\models;

use Yii;

/**
 * This is the model class for table "datatype".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ObjectProperty[] $objectProperties
 */
class Datatype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'datatype';
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
    public function getObjectProperties()
    {
        return $this->hasMany(ObjectProperty::className(), ['datatype_id' => 'id'])->inverseOf('datatype');
    }
}
