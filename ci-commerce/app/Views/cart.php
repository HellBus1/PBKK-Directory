<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
  <div class="row">
    <div class="col-9">
      <?php $total = 0 ?>
      <h2 class="mb-4 text-center">Cart</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order_products as $key=>$order_product) : ?>
            <tr>
              <th scope="row"><?=++$key?></th>
              <td><?=$order_product['prd_name']?> (Rp. <?=number_format($order_product['prd_price'], 2, ',', '.')?>)</td>
              <td><?=$order_product['orp_amount']?>x</td>
              <td>Rp. <?=number_format($order_product['prd_price'] * $order_product['orp_amount'], 2, ',', '.')?></td>
              <?php $total += ($order_product['prd_price'] * $order_product['orp_amount'])?>
              <td><a href="/cart/delete/<?=$order_product['id']?>" class="btn btn-sm btn-danger">Remove</a></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="border-2 col-3 border-start">
      <h4 class="mb-4 text-center">Checkout Details</h4>
      Total: <strong>Rp. <?=number_format($total, 2, ',', '.')?></strong>
      <form action="/checkout" method="POST">
        <input type="hidden" name="total" value="<?=$total?>">
        <div class="my-2 row align-items-center">
          <div class="col-auto">
            <label for="address" class="col-form-label">Address:</label>
          </div>
          <div class="col-auto">
            <input type="text" name="address" class="form-control">
          </div>
        </div>
        <div class="gap-2 d-grid">
         <button class="btn btn-success" type="submit">Checkout</button>
        </div>
      </form>
    </div>
  </div>
<?= $this->endSection() ?>
