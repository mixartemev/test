<?php

use yii\db\Migration;

/**
 * Handles the creation for table `string_val`.
 */
class m160929_114952_create_object_property_val_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_property_val', [
            'id' => $this->primaryKey(),
            'object_id' => $this->integer(),
            'property_id' => $this->integer(),
            'val' => $this->string()->notNull(),
        ]);
		// add foreign key for table `object_id`
		$this->addForeignKey(
			'fk-object_property_val-object_id',
			'object_property_val',
			'object_id',
			'object',
			'id',
			'CASCADE'
		);
		// add foreign key for table `property_id`
		$this->addForeignKey(
			'fk-object_property_val-object_property_id',
			'object_property_val',
			'property_id',
			'object_property',
			'id',
			'CASCADE'
		);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropForeignKey('fk-object_property_val-object_id', 'object_property_val');
		$this->dropForeignKey('fk-object_property_val-object_property_id', 'object_property_val');
        $this->dropTable('object_property_val');
    }
}
