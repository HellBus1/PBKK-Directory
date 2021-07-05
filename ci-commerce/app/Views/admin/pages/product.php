<?= $this->extend('admin/fragments/app') ?>
<?= $this->section('content') ?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="mb-2 row">
        <div class="col-sm-6">
          <h1 class="m-0">Produk</h1>
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah Produk</button>
          </div>
        </div>

        <div class="card-body">
          <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
          <?php elseif (session()->getFlashdata('sukses')) : ?>
            <div class="alert alert-success"><?= session()->getFlashdata('sukses') ?></div>
          <?php endif; ?>

          <?php $idx = 1; ?>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Stock</th>
                <th>Kategori</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product) : ?>
                <tr>
                  <td><?= $idx++ ?></td>
                  <td><?= $product["prd_name"] ?></td>
                  <td><?= $product["prd_price"] ?></td>
                  <td><?= $product["prd_description"] ?></td>
                  <td>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal">View Image</button>

                    <div class="modal" tabindex="-1" role="dialog" id="viewModal">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Preview Gambar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
                              <img src="<?= base_url($product["prd_image"]) ?>" width="100%" height="auto" />
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td><?= $product["prd_stock"] ?></td>
                  <td><?= $product["ctr_id"] ?></td>
                  <td>
                    <button class="btn btn-primary">Update</button>
                  </td>
                  <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">delete</button>
                    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Preview Gambar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="card-body">
                              <div>Apakah anda yakin?</div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <a class="btn btn-primary" href="product/delete/<?= $product['id'] ?>">
                                Submit
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <?= $this->include('admin/pages/product-components/add-form') ?>
</div>
<?= $this->endSection() ?>