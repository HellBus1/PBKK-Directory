<?= $this->extend('admin/fragments/app') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Transaksi</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>


  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <div class="card-title">

          </div>
        </div>

        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Timestamp</th>
                <th scope="col">Total Price</th>
                <th scope="col">Address</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($orders as $key => $order) : ?>
                <tr>
                  <th scope="row"><?= ++$key ?></th>
                  <td><?= $order['ord_date'] ?></td>
                  <td><?= $order['ord_total_penjualan'] ?></td>
                  <td><?= $order['ord_alamat'] ?></td>
                  <td><?= $order['ord_verified_by_seller'] ? 'Verified' : 'Not verified' ?></td>
                  <td><a class="btn btn-sm btn-primary" href="/admin/order/approve/<?= $order['id'] ?>">Approve</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

</div>
<?= $this->endSection() ?>