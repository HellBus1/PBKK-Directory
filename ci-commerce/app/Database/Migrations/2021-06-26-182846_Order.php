<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Order extends Migration
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
      'usr_id'           => [
        'type'           => 'INT',
      ],
      'ord_date'         => [
        'type'           => 'DATETIME',
        'null'           => true,
      ],
      'ord_total_penjualan'  => [
        'type'           => 'INT',
        'null'           => true,
      ],
      'ord_alamat'  => [
        'type'           => 'VARCHAR',
        'null'           => true,
      ],
      'ord_verified_by_seller'  => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
        'null'           => true,
      ],
    ]);

    // Membuat primary key
    $this->forge->addKey('id', TRUE);

    // Membuat tabel news
    $this->forge->createTable('order', TRUE);
  }

  public function down()
  {
    // menghapus tabel news
    $this->forge->dropTable('order');
  }
}
