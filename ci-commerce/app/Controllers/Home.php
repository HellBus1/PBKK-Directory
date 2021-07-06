<?php

namespace App\Controllers;

use App\Models\Product;

class Home extends BaseController
{
	public function index()
	{
		$product = new Product();
    $data['products'] = $product->findAll();

    return view("index", $data);
	}

	public function search()
	{
		$product = new Product();
    $data['products'] = $product->like('prd_name', '%'.$this->request->getVar('search').'%')->findAll();

    return view("index", $data);
	}
}
