<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class OrderProduct extends Migration
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
      'ord_id'           => [
        'type'           => 'INT',
        'null'           => TRUE,
      ],
      'usr_id'           => [
        'type'           => 'INT',
      ],
      'prd_id'           => [
        'type'           => 'INT',
      ],
      'orp_amount'       => [
        'type'           => 'INT',
      ],
    ]);

    // Membuat primary key
    $this->forge->addKey('id', TRUE);

    // Membuat foreign key
    $this->forge->addForeignKey('ord_id', 'order', 'id');

    // Membuat foreign key
    $this->forge->addForeignKey('usr_id', 'user', 'id');

    // Membuat foreign key
    $this->forge->addForeignKey('prd_id', 'product', 'id');

    // Membuat tabel news
    $this->forge->createTable('order_product', TRUE);
  }

  public function down()
  {
    // menghapus tabel news
    $this->forge->dropTable('order_product');
  }
}
