<?php

use yii\db\Migration;

/**
 * Handles the creation for table `object_type`.
 */
class m160929_112918_create_object_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('object_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('object_type');
    }
}
