<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
  public function up()
  {
    $this->forge->addField([
      'id'               => [
        'type'           => 'INT',
        'constraint'     => 5,
        'unsigned'       => true,
        'auto_increment' => true
      ],
      'usr_name'         => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'usr_email'        => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => false,
        'unique'         => true
      ],
      'usr_password'     => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => false,
      ],
      'usr_role'         => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
    ]);

    // Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('user', TRUE);
  }

  public function down()
  {
    // menghapus tabel news
    $this->forge->dropTable('user');
  }
}
