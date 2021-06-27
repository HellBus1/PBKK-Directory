<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'category';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $allowedFields        = ['ctr_name'];
}
