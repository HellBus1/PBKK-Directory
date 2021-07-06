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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editModal<?= $idx ?>">Update</button>
                    <div class="modal" tabindex="-1" role="dialog" id="editModal<?= $idx ?>">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Tambah Produk</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form method="post" enctype="multipart/form-data" action="<?= base_url('/admin/product/edit/'.$product['id']) ?>">
                              <div class="card-body">
                                <div class="form-group">
                                  <label for="prd_name<?= $idx ?>">Nama</label>
                                  <input type="text" class="form-control" id="prd_name<?= $idx ?>" placeholder="Enter email" name="prd_name" value="<?= $product['prd_name'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="prd_price<?= $idx ?>">Harga</label>
                                  <input type="number" class="form-control" id="prd_price<?= $idx ?>" placeholder="Password" name="prd_price" value="<?= $product['prd_price'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="prd_description<?= $idx ?>">Deskripsi</label>
                                  <input type="text" class="form-control" id="prd_description<?= $idx ?>" placeholder="Password" name="prd_description" value="<?= $product['prd_description'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="prd_stock<?= $idx ?>">Stok</label>
                                  <input type="number" class="form-control" id="prd_stock<?= $idx ?>" placeholder="Password" name="prd_stock" value="<?= $product['prd_stock'] ?>">
                                </div>
                                <div class="form-group">
                                  <label for="prd_image<?= $idx ?>">Gambar</label>
                                  <input type="file" class="form-control" id="prd_image<?= $idx ?>" name="prd_image">
                                </div>
                                <div class="form-group">
                                  <label for="ctr_id<?= $idx ?>">Kategori</label>
                                  <select class="custom-select form-control-border" id="ctr_id<?= $idx ?>" name="ctr_id">
                                    <?php foreach ($categories as $category) : ?>
                                      <?php if ($product['ctr_id'] == $category['id']) : ?>
                                        <option value="<?= $category['id'] ?>" selected><?= $category['ctr_name'] ?></option>
                                      <?php else : ?>
                                        <option value="<?= $category['id'] ?>"><?= $category['ctr_name'] ?></option>
                                      <?php endif ?>
                                    <?php endforeach ?>
                                  </select>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                  <td>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">delete</button>
                    <div class="modal" tabindex="-1" role="dialog" id="deleteModal">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title">Delete Product</h5>
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