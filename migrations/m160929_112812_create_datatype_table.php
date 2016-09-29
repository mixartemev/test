<?php

use yii\db\Migration;

/**
 * Handles the creation for table `datatype`.
 */
class m160929_112812_create_datatype_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('datatype', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);

        // fill
        $this->insert('datatype',[
            'id' => 1,
            'name' => 'text',
        ]);
        $this->insert('datatype',[
            'id' => 2,
            'name' => 'int',
        ]);
        $this->insert('datatype',[
            'id' => 3,
            'name' => 'boolean',
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('datatype');
    }
}
