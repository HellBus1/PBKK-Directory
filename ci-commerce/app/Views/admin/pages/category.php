<?= $this->extend('admin/fragments/app') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Kategori</h1>
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
            <button class="btn btn-primary">Tambah Kategori</button>
          </div>
        </div>

        <div class="card-body">
          <?php $idx = 1; ?>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Kategori</th>
                <th>Update</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($categories as $category) : ?>
                <tr>
                  <td><?= $idx++ ?></td>
                  <td><?= $category['ctr_name'] ?></td>
                  <td></td>
                </tr>
              <?php endforeach ?>
          </table>
        </div>
      </div>
    </div>
  </section>

</div>
<?= $this->endSection() ?>