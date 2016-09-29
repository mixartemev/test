<?php

use yii\db\Migration;

class m160927_153243_create_first_user extends Migration
{
    public function up()
    {
        $this->insert('user',[
            'id' => 1,
            'email' => 'admin@test.com',
            'password_hash' => '$2y$13$27d3pqkKhwJ1/CLEg968DOR7thWgijTrWw2BVPRH4N7Z8vjZ/LBX6', // hash of password: 123456
            'auth_key' => 'h1YGPWD1n7QIyFOiItlRbUwL1An1XQgv'
        ]);
    }

    public function down()
    {
        $this->delete('user', ['email' => 'admin@test.com']);
    }
}
