<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Order;
use App\Models\OrderProduct;

Class UserController extends BaseController
{
  public function cart()
  {
    $order_products = new OrderProduct();
    $user_id = session()->id;
    $data['order_products'] = $order_products->select(['order_product.*', 'prd_name', 'prd_price'])->join('product', 'prd_id = product.id', 'left')->where('ord_id', null)->where('usr_id', $user_id)->findAll();
    return view('cart', $data);
  }

  public function addItem()
  {
    if (!$this->validate([
      'quantity' => [
        'rules' => 'required',
        'errors' => [
          'required' => '{field} Harus diisi'
        ]
        ]])
      ) {
      session()->setFlashdata('msg', $this->validator->listErrors());
      return redirect()->back()->withInput();
    };

    $id = $this->request->getVar('prd_id');
    $quantity = $this->request->getVar('quantity');
    $user_id = session()->id;
    
    $data = new OrderProduct();
    $data = $data->where(['prd_id' => $id, 'ord_id' => null, 'usr_id' => $user_id])->first(); 
    if ($data) {
      $order_product = new OrderProduct();
      $order_product->set('orp_amount', $data['orp_amount'] + $quantity);
      $order_product->where(['prd_id' => $id, 'ord_id' => null, 'usr_id' => $user_id]);
      $order_product->update();
    }
    else {
      $data = new OrderProduct();
      $data->insert([
        'prd_id' => $id,
        'usr_id' => $user_id,
        'orp_amount' => $quantity
      ]);
    }

    return redirect()->back();
  }

  public function deleteItem($id)
  {
    // remove item dari cart -> redirect back pake flash
    $order_product = new OrderProduct();
    $order_product->delete(['id' => $id]);

    return redirect()->back();
  }

  public function processCheckout()
  {
    $order = new Order();
    $user_id = session()->id;
    $order = new Order();
    $order->insert([
      'usr_id' => $user_id,
      'ord_date' => date('Y-m-d H:i:s'),
      'ord_total_penjualan' => $this->request->getVar('total'),
      'ord_alamat' => $this->request->getVar('address')
    ]);
    $order = new Order();
    $order = $order->findAll();
    $order_id = end($order)['id'];

    $order_product = new OrderProduct();
    $order_product->set('ord_id', $order_id);
    $order_product->where(['ord_id' => null, 'usr_id' => $user_id]);
    $order_product->update();

    return redirect()->back();
  }

  public function transactionList()
  {
    // list semua transaction order by time desc
    $order = new Order();
    $user_id = session()->id;
    $data['orders'] = $order->where('usr_id', $user_id)->findAll();

    return view("transactions", $data);
  }

  public function transaction($id)
  {
    // view satu transaction
    $order = new Order();
    $data['order'] = $order->where('id', $id)->first();
    $order_products = new OrderProduct();
    $data['order_products'] = $order_products->select(['order_product.*', 'prd_name', 'prd_price'])->join('product', 'prd_id = product.id', 'left')->where('ord_id', $id)->findAll();
    return view("transaction", $data);
  }
}