<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
  <h2 class="mb-4 text-center">Order List</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Timestamp</th>
        <th scope="col">Total Price</th>
        <th scope="col">Address</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $key=>$order) : ?>
        <th scope="row"><?=$key+1?></th>
        <td><?=$order['ord_date']?></td>
        <td><?=$order['ord_total_penjualan']?></td>
        <td><?=$order['ord_alamat']?></td>
        <td><a class="btn btn-sm btn-primary" href="/transactions/<?=$order['id']?>">Detail</a></td>
      <?php endforeach ?>
    </tbody>
  </table>
<?= $this->endSection() ?>
