<?php

namespace App\Models;

use CodeIgniter\Model;

class Order extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'order';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $allowedFields        = ['usr_id', 'ord_date', 'ord_total_penjualan', 'ord_alamat', 'ord_verified_by_seller'];
}
