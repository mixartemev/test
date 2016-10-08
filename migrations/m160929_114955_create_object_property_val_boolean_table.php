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
            'id' => $this->primaryKey(),
            'val' => $this->boolean()->notNull(),
		]);

		// add foreign key for table `object_val`
		$this->addForeignKey(
			'fk-val_boolean',
			'object_property_val_boolean',
			'id',
			'object_property_val',
			'val_id',
			'CASCADE'
		);

		//fill
		$this->insert('object_property_val_boolean',[
			'id' => 7,
			'val' => false,
		]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropForeignKey('fk-val_boolean', 'object_property_val_boolean');
        $this->dropTable('object_property_val_boolean');
    }
}
