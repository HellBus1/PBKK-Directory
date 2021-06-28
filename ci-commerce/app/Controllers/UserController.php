<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;

Class UserController extends BaseController
{
  public function index()
  {
    return view("user/pages/dashboard");
  }


  public function cart()
  {
    $order_product = new OrderProduct();
    $user_id = $this->session->userdata('client_user_id');
    $data = $order_product->where('ord_id', null)->where('usr_id', $user_id)->findAll();
    return view('', $data);
  }

  public function addItem()
  {
    // tambah item ke cart -> redirect back pake flash
    if (isset($_POST['submit'])) {
      $name=$_POST['name'];
      $code=$_POST['code'];
      $quantity=$_POST['quantity'];
      $sql = "INSERT INTO Order (name, code, quantity)
      VALUES ('$name', '$code', '$quantity')";
      if ($conn->query($sql) === TRUE) {
          
      } else {   

      }
    } else {
      echo 'query doesnt execute';
    }
    return redirect();
  }

  public function deleteItem($id)
  {
    // remove item dari cart -> redirect back pake flash
    if (!empty($_SESSION["Order"])) {
        foreach ($_SESSION["Order"] as $k => $v) {
            if ($_GET["code"] == $k)
                unset($_SESSION["cart_item"][$k]);				
            if (empty($_SESSION["cart_item"]))
                unset($_SESSION["cart_item"]);
        }
    }
    return redirect();
  }

  public function processCheckout()
  {
    // pindah cart ke checkout (create new order -> assign the id to the cart) -> redirect ke checkout list
    $total = 0;
    $allitems = "";
    $items = array();
    $user_id = $this->session->userdata('client_user_id');
    $order = new Order(); // ini create order baru harusnya
    $order_id = 1; // ganti 1 jadi hasil create

    $order_product = new OrderProduct();
    $order_product->set('ord_id', $order_id)->where('ord_id', null)->where('usr_id', $user_id);
    $order_product->update();

    return redirect();
  }

  public function transactionList()
  {
    // list semua transaction order by time desc
    $order = new Order();
    $user_id = $this->session->userdata('client_user_id');
    $data = $order->where('usr_id', $user_id)->findAll();

    return view("transaction", $data);
  }

  public function transaction($id)
  {
    // view satu transaction
    $order = new Order();
    $data['order'] = $order->where('id', $id)->findOne();
    $order_product = new OrderProduct();
    $data['order_products'] = $order_product->where('ord_id', $id)->findAll();

    return view("transaction", $data);
  }
}