<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
	public function run()
	{
		$data = [
      [
        'usr_name' => 'Syubban Fakhriya',
        'usr_email' => 'syubban@gmail.com',
        'usr_password' => password_hash('123456', PASSWORD_DEFAULT),
        'usr_role' => 'admin'
      ],
      [
        'usr_name' => 'Adam Garibaldi',
        'usr_email' => 'adam@gmail.com',
        'usr_password' => password_hash('123456', PASSWORD_DEFAULT),
        'usr_role' => 'admin'
      ],
    ];
    $this->db->table('user')->insertBatch($data);
	}
}
