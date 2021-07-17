<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
	public function up()
	{
        $this->forge->addField([
            'user_id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_name'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'user_mail' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'user_password' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            "session_id" => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'admin' => [
                'type' => 'BOOLEAN',
                'default' => 0
            ]
        ]);
        $this->forge->addKey('user_id', true, true);
        $this->forge->addUniqueKey(['user_mail', 'session_id']);
        $this->forge->createTable('users');
	}

	public function down()
	{
	}
}
