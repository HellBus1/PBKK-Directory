<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Category extends Migration
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
      'ctr_name'         => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
    ]);

    // Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('category', TRUE);
  }

  public function down()
  {
    // menghapus tabel news
    $this->forge->dropTable('category');
  }
}
