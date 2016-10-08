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
            'id' => $this->primaryKey(),
            'val' => $this->string()->notNull(),
		]);

		// add foreign key for table `object_id`
		$this->addForeignKey(
			'fk-val_text',
			'object_property_val_text',
			'id',
			'object_property_val',
			'val_id',
			'CASCADE'
		);

		//fill
		$this->insert('object_property_val_text',[
			'id' => 1,
			'val' => 'КК-ИВН-1',
		]);
		$this->insert('object_property_val_text',[
			'id' => 2,
			'val' => 'BUS-ИКР-1',
		]);
		$this->insert('object_property_val_text',[
			'id' => 3,
			'val' => 'КР-КОС-1',
		]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
		$this->dropForeignKey('fk-val_text', 'object_property_val_text');
        $this->dropTable('object_property_val_text');
    }
}
