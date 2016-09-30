<?php

use yii\db\Migration;

/**
 * Handles the creation for table `object_type_object_property`.
 * Has foreign keys to the tables:
 *
 * - `object_type`
 * - `object_property`
 */
class m160929_114128_create_junction_table_for_object_type_and_object_property_tables extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_type_object_property', [
            'object_type_id' => $this->integer(),
            'object_property_id' => $this->integer(),
            'PRIMARY KEY(object_type_id, object_property_id)',
        ]);

        // creates index for column `object_type_id`
        $this->createIndex(
            'idx-object_type_object_property-object_type_id',
            'object_type_object_property',
            'object_type_id'
        );

        // add foreign key for table `object_type`
        $this->addForeignKey(
            'fk-object_type_object_property-object_type_id',
            'object_type_object_property',
            'object_type_id',
            'object_type',
            'id',
            'CASCADE'
        );

        // creates index for column `object_property_id`
        $this->createIndex(
            'idx-object_type_object_property-object_property_id',
            'object_type_object_property',
            'object_property_id'
        );

        // add foreign key for table `object_property`
        $this->addForeignKey(
            'fk-object_type_object_property-object_property_id',
            'object_type_object_property',
            'object_property_id',
            'object_property',
            'id',
            'CASCADE'
        );

        // fill
        $this->insert('object_type_object_property',[
            'object_type_id' => 1,
            'object_property_id' => 1
        ]);
        $this->insert('object_type_object_property',[
            'object_type_id' => 1,
            'object_property_id' => 2
        ]);
        $this->insert('object_type_object_property',[
            'object_type_id' => 2,
            'object_property_id' => 3
        ]);
        $this->insert('object_type_object_property',[
            'object_type_id' => 3,
            'object_property_id' => 1
        ]);
        $this->insert('object_type_object_property',[
            'object_type_id' => 1,
            'object_property_id' => 4
        ]);
        $this->insert('object_type_object_property',[
            'object_type_id' => 2,
            'object_property_id' => 5
        ]);
        $this->insert('object_type_object_property',[
            'object_type_id' => 3,
            'object_property_id' => 6
        ]);

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        // drops foreign key for table `object_type`
        $this->dropForeignKey(
            'fk-object_type_object_property-object_type_id',
            'object_type_object_property'
        );

        // drops index for column `object_type_id`
        $this->dropIndex(
            'idx-object_type_object_property-object_type_id',
            'object_type_object_property'
        );

        // drops foreign key for table `object_property`
        $this->dropForeignKey(
            'fk-object_type_object_property-object_property_id',
            'object_type_object_property'
        );

        // drops index for column `object_property_id`
        $this->dropIndex(
            'idx-object_type_object_property-object_property_id',
            'object_type_object_property'
        );

        $this->dropTable('object_type_object_property');
    }
}
