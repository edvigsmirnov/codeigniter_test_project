<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id' => [
                    'type' => 'INT',
                    'unsigned' => true,
                    'auto_increment' => true,
                    'NULL' => false,
                ],
                'first_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'NULL' => false,
                ],
                'last_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'NULL' => false,
                ],
                'email' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'NULL' => false,
                ],
                'role' => [
                    'type' => 'VARCHAR',
                    'constraint' => '255',
                    'NULL' => false,
                ],
                'date_created' => [
                    'type' => 'DATE',
                    'NULL' => false,
                ],
            ]
        );
        $this->forge->addKey('id', true);
        $this->forge->addKey('email');
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
    }
}
