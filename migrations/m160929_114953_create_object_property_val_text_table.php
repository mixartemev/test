<?php

use yii\db\Migration;

/**
 * Handles the creation for table `string_val`.
 */
class m160929_114953_create_object_property_val_text_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_property_val_text', [
            'object_id' => $this->integer(),
            'property_id' => $this->integer(),
            'val' => $this->string()->notNull(),
			'PRIMARY KEY(object_id, property_id)'
		]);

		// add foreign key for table `object_id`
		$this->addForeignKey(
			'fk-object_property_val_text-object_id',
			'object_property_val_text',
			'object_id',
			'object',
			'id',
			'CASCADE'
		);
		// add foreign key for table `property_id`
		$this->addForeignKey(
			'fk-object_property_val_text-object_property_id',
			'object_property_val_text',
			'property_id',
			'object_property',
			'id',
			'CASCADE'
		);

		//fill
		$this->insert('object_property_val_text',[
			'object_id' => 1,
			'property_id' => 1,
			'val' => 'КК-ИВН-1',
		]);
		$this->insert('object_property_val_text',[
			'object_id' => 3,
			'property_id' => 1,
			'val' => 'BUS-ИКР-1',
		]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropForeignKey('fk-object_property_val_text-object_id', 'object_property_val_text');
		$this->dropForeignKey('fk-object_property_val_text-object_property_id', 'object_property_val_text');
        $this->dropTable('object_property_val_text');
    }
}
