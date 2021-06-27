<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'product';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $allowedFields        = ['prd_name', 'prd_price', 'prd_description', 'prd_image', 'prd_stock', 'ctr_id'];
}
