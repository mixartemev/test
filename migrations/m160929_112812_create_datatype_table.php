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
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('datatype');
    }
}
