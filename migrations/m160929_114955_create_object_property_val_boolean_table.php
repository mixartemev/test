<?php

use yii\db\Migration;

/**
 * Handles the creation for table `string_val`.
 */
class m160929_114955_create_object_property_val_boolean_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_property_val_boolean', [
            'object_id' => $this->integer(),
            'property_id' => $this->integer(),
            'val' => $this->string()->notNull(),
			'PRIMARY KEY(object_id, property_id)'
		]);

		// add foreign key for table `object_id`
		$this->addForeignKey(
			'fk-object_property_val_boolean-object_id',
			'object_property_val_boolean',
			'object_id',
			'object',
			'id',
			'CASCADE'
		);
		// add foreign key for table `property_id`
		$this->addForeignKey(
			'fk-object_property_val_boolean-object_property_id',
			'object_property_val_boolean',
			'property_id',
			'object_property',
			'id',
			'CASCADE'
		);

		//fill
		$this->insert('object_property_val_boolean',[
			'object_id' => 2,
			'property_id' => 3,
			'val' => 0,
		]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropForeignKey('fk-object_property_val_boolean-object_id', 'object_property_val_boolean');
		$this->dropForeignKey('fk-object_property_val_boolean-object_property_id', 'object_property_val_boolean');
        $this->dropTable('object_property_val_boolean');
    }
}
