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
    // ->join('category', 'category.id = product.ctr_id', 'INNER')
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
      $file = $this->request->getFile('prd_image');
      $category = $this->request->getVar('ctr_id');
      $originalName = null;

      if ($file) {
        $originalName = $file->getClientName(); // Mengetahui Nama Asli
        $ext = $file->getClientExtension(); // Mengetahui extensi File
        $type = $file->getClientMimeType(); // Mengetahui Mime File
        $name_total = $file->getRandomName();
        $file->move('images/', $name_total);
      }

      $data = new Product();
      $data->insert([
        'prd_name' => $name,
        'prd_price' => $price,
        'prd_description' => $description,
        'prd_stock' => $stock,
        'ctr_id' => $category,
        'prd_image' => $file != null ? 'images/' . $name_total : null
      ]);

      session()->setFlashdata('sukses', 'Berhasil ditambah');
      return redirect()->to('/admin/product');
    }
  }

  public function deleteProduct($id)
  {
    $product = new Product();

    $result = $product->find($id);

    // var_dump($result);
    // die();

    if (file_exists($result['prd_image']) && $result['prd_image']) {
      unlink($result['prd_image']);
    }

    $product2 = new Product();
    $product2 = $product2->where('id', $id);
    $product2->delete();

    session()->setFlashdata('sukses', 'Berhasil dihapus');
    return redirect()->to('/admin/product');
  }

  public function editProduct($id)
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
      $file = $this->request->getFile('prd_image');
      $category = $this->request->getVar('ctr_id');
      $originalName = null;
      // var_dump($file->getSize());
      // die();
      $data = new Product();
      $data_edited = $data->where('id', $id)->first();

      if ($file->getSize() > 0) {
        unlink($data_edited['prd_image']);
        $originalName = $file->getClientName(); // Mengetahui Nama Asli
        $ext = $file->getClientExtension(); // Mengetahui extensi File
        $type = $file->getClientMimeType(); // Mengetahui Mime File
        $name_total = $file->getRandomName();
        $file->move('images/', $name_total);
      }


      $data->update($id, [
        'prd_name' => $name,
        'prd_price' => $price,
        'prd_description' => $description,
        'prd_stock' => $stock,
        'ctr_id' => $category,
        'prd_image' => $file->getSize() > 0 ? 'images/' . $name_total : $data_edited['prd_image']
      ]);

      session()->setFlashdata('sukses', 'Berhasil diupdate');
      return redirect()->to('/admin/product');
    }
  }

  public function orders()
  {
    $order = new Order();
    $data['orders'] = $order->findAll();

    return view("admin/pages/transaction", $data);
  }

  public function approveOrder($id)
  {
    $data = new Order();
    $data_edited = $data->where('id', $id)->first();

    $data->update($id, [
      'ord_verified_by_seller' => '1',
    ]);

    session()->setFlashdata('sukses', 'Berhasil ditambah');
    return redirect()->to('/admin/order');
  }
}
