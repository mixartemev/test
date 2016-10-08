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
            'object_id' => $this->integer(),
            'property_id' => $this->integer(),
            'val_id' => $this->primaryKey(),
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

		//fill
		$this->insert('object_property_val',[
			'object_id' => 1,
			'property_id' => 1,
			'val_id' => 1,
		]);
		$this->insert('object_property_val',[
			'object_id' => 3,
			'property_id' => 1,
			'val_id' => 2,
		]);
		$this->insert('object_property_val_text',[
			'object_id' => 4,
			'property_id' => 1,
			'val_id' => 3,
		]);
		$this->insert('object_property_val',[
			'object_id' => 1,
			'property_id' => 4,
			'val_id' => 4,
		]);
		$this->insert('object_property_val',[
			'object_id' => 2,
			'property_id' => 5,
			'val_id' => 5,
		]);
		$this->insert('object_property_val',[
			'object_id' => 3,
			'property_id' => 6,
			'val_id' => 6,
		]);
		$this->insert('object_property_val',[
			'object_id' => 2,
			'property_id' => 3,
			'val_id' => 7,
		]);
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
