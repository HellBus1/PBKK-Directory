<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
  <div class="row">
    <div class="col-9">
      <h2 class="mb-4 text-center">Item List</h2>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Item</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($order_products as $key=>$order_product) : ?>
            <tr>
              <th scope="row"><?=++$key?></th>
              <td><?=$order_product['prd_name']?> (Rp. <?=number_format($order_product['prd_price'], 2, ',', '.')?>)</td>
              <td><?=$order_product['orp_amount']?>x</td>
              <td>Rp. <?=number_format($order_product['prd_price'] * $order_product['orp_amount'], 2, ',', '.')?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
    <div class="border-2 col-3 border-start">
      <h4 class="mb-4 text-center">Order Details</h4>
      <p class="my-1">
      Timestamp: <strong><?=$order['ord_date']?></strong>
      </p>
      <p class="my-1">
        Total: <strong>Rp. <?=number_format($order['ord_total_penjualan'], 2, ',', '.')?></strong>
      </p>
      <p class="my-1">
        Address: <strong><?=$order['ord_alamat']?></strong>
      </p>
      <p class="my-1">
        Status: <strong><?=$order['ord_verified_by_seller'] ? 'Verified' : 'Not verified' ?></strong>
      </p>
    </div>
  </div>
<?= $this->endSection() ?>
