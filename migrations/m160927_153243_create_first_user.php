<?php

use yii\db\Migration;

class m160927_153243_create_first_user extends Migration
{
    public function up()
    {
        $this->insert('user',[
            'id' => 1,
            'email' => 'admin@test.com',
            'password_hash' => '$2y$13$ycwvwtyp7tP7xAVLE0laNeuFs3IvgNyk7RbzAyCR8g/Qcy8iGdaA6',
            'auth_key' => 'h1YGPWD1n7QIyFOiItlRbUwL1An1XQgv',
            'created_at' => time(),
            'updated_at' => time(),
        ]);
    }

    public function down()
    {
        $this->delete('user', ['username' => 'admin']);
    }
}
