<?php

use yii\db\Migration;

/**
 * Handles the creation for table `object`.
 */
class m160929_114433_create_object_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object', [
            'id' => $this->primaryKey(),
			'created_by' => $this->date(),
            'name' => $this->string(),
            'object_type_id' => $this->integer()->notNull(),
        ]);
        // add foreign key for table `datatype`
        $this->addForeignKey(
            'fk-object-object_type_id',
            'object',
            'object_type_id',
            'object_type',
            'id'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropForeignKey('fk-object-object_type_id', 'object');
        $this->dropTable('object');
    }
}
