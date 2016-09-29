<?php

use yii\db\Migration;

/**
 * Handles the creation for table `object_property`.
 */
class m160929_113428_create_object_property_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_property', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'datatype_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `object_type_id`
        $this->createIndex(
            'idx-object_property-datatype_id',
            'object_property',
            'datatype_id'
        );
        // add foreign key for table `datatype`
        $this->addForeignKey(
            'fk-object_property-datatype_id',
            'object_property',
            'datatype_id',
            'datatype',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-object_property-datatype_id', 'object_property');
        $this->dropIndex('idx-object_property-datatype_id', 'object_property');
        $this->dropTable('object_property');
    }
}
