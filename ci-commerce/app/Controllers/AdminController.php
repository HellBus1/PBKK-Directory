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

  public function categories()
  {
    $category = new Category();
    $data['categories'] = $category->findAll();

    return view("admin/pages/category", $data);
  }

  public function products()
  {
    helper(['form']);

    $product = new Product();
    $category = new Category();
    
    $data['categories'] = $category->findAll();
    $data['products'] = $product->findAll();

    return view("admin/pages/product", $data);
  }

  public function createProduct()
  {
    if (!$this->validate([
      'prd_name' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Harus diisi'
        ]
      ],
      'prd_price' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Harus diisi',
        ]
      ],
      'prd_description' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Harus diisi'
        ]
      ],
    ])) {
      session()->setFlashdata('msg', $this->validator->listErrors());
      return redirect()->back()->withInput();
    } else {
      $name = $this->request->getVar('prd_name');
      $price = $this->request->getVar('prd_price');
      $description = $this->request->getVar('prd_description');
      $stock = $this->request->getVar('prd_stock');
      // $image = $this->request->getVar('prd_image');
      // $file = $this->requestt->getVar('prd_image');
      // $originalName = null;

      // if($file){
      //   $originalName = $file->getClientName(); // Mengetahui Nama Asli
      //   $ext = $file->getClientExtension(); // Mengetahui extensi File
      //   $type = $file->getClientMimeType(); // Mengetahui Mime File
      //   $name_total = random_string('unique', 10).'_'.$originalName;
      //   $file->move(base_url('images'), $name_total);
      // }

      $data = new Product();
      $data->insert([
        'prd_name' => $name,
        'prd_price' => $price,
        'prd_description' => $description,
        'prd_stock' => $stock,
        'prd_image' => null
      ]);

      session()->setFlashdata('sukses', 'Berhasil ditambah');
      return redirect()->to('/admin/product');
    }
  }

  public function deleteProduct($id)
  {
  }

  public function editProduct()
  {
  }

  public function orders()
  {
    $order = new Order();
    $data['orders'] = $order->findAll();

    return view("admin/pages/transaction", $data);
  }

  public function approveOrder()
  {
  }
}
