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
			'created_by' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
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

        // fill
        $this->insert('object',[
            'id' => 1,
            'name' => 'Ивановец',
            'object_type_id' => 1
        ]);
        $this->insert('object',[
            'id' => 2,
            'name' => 'Зил',
            'object_type_id' => 2
        ]);
        $this->insert('object',[
            'id' => 3,
            'name' => 'Икарус',
            'object_type_id' => 3
        ]);
        $this->insert('object',[
            'id' => 4,
            'name' => 'Костромич',
            'object_type_id' => 1
        ]);
        $this->insert('object',[
            'id' => 5,
            'name' => 'BMW',
            'object_type_id' => 2
        ]);
        $this->insert('object',[
            'id' => 6,
            'name' => 'Mersedes',
            'object_type_id' => 3
        ]);
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
