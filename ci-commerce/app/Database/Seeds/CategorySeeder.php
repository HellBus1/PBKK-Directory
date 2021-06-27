<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'ctr_name' => 'Perabot',
      ],
      [
        'ctr_name' => 'Elektronik',
      ],
      [
        'ctr_name' => 'Sembako',
      ],
      [
        'ctr_name' => 'Senjata Api',
      ],
      [
        'ctr_name' => 'Peledak',
      ],
    ];
    $this->db->table('category')->insertBatch($data);
  }
}
