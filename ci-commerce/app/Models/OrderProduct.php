<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderProduct extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'order_product';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $allowedFields        = ['ord_id', 'prd_id', 'orp_amount'];
}
