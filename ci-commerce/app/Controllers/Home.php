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
}
