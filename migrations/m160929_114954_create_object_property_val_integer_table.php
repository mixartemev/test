<?php

use yii\db\Migration;

/**
 * Handles the creation for table `string_val`.
 */
class m160929_114954_create_object_property_val_integer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_property_val_integer', [
            'id' => $this->primaryKey(),
            'val' => $this->integer()->notNull(),
		]);

		// add foreign key for table `object_val`
		$this->addForeignKey(
			'fk-val_integer',
			'object_property_val_integer',
			'id',
			'object_property_val',
			'val_id',
			'CASCADE'
		);

		//fill
		$this->insert('object_property_val_integer',[
			'id' => 4,
			'val' => 6500,
		]);
		$this->insert('object_property_val_integer',[
			'id' => 5,
			'val' => 130,
		]);
		$this->insert('object_property_val_integer',[
			'id' => 6,
			'val' => 66,
		]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropForeignKey('fk-val_integer', 'object_property_val_integer');
        $this->dropTable('object_property_val_integer');
    }
}
