<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class AdminController extends BaseController
{
	public function index()
	{
		return view("admin/pages/dashboard");
	}

  public function categories(){
    $category = new Category();
    $data['categories'] = $category->findAll();
    
    return view("admin/pages/category", $data);
  }

  public function products(){
    $product = new Product();
    $data['products'] = $product->findAll();

    return view("admin/pages/product", $data);
  }

  public function orders(){
    $order = new Order();
    $data['orders'] = $order->findAll();

    return view("admin/pages/transaction", $data);
  }
}
