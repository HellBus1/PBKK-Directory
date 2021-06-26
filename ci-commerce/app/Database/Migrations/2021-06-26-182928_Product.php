<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
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
      'prd_name'         => [
        'type'           => 'VARCHAR',
        'constraint'     => '255',
      ],
      'prd_price'        => [
        'type'           => 'INT',
        'null'           => true,
      ],
      'prd_description'  => [
        'type'           => 'TEXT',
        'null'           => true,
      ],
      'prd_image'        => [
        'type'           => 'TEXT',
        'null'           => true,
      ],
      'prd_stock'        => [
        'type'           => 'INT',
        'null'           => true,
      ],
      'ctr_id'           => [
        'type'           => 'INT',
        'null'           => true,
      ],
    ]);

    // Membuat primary key
    $this->forge->addKey('id', TRUE);

    // Membuat foreign key
    $this->forge->addForeignKey('ctr_id', 'category', 'id');

    // Membuat tabel news
    $this->forge->createTable('product', TRUE);
  }

  public function down()
  {
    // menghapus tabel news
    $this->forge->dropTable('product');
  }
}
