<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'user';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';

	protected $allowedFields        = ['usr_name', 'usr_email', 'usr_password', 'usr_role'];
}
