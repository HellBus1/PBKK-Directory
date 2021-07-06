<div class="modal" tabindex="-1" role="dialog" id="addModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" enctype="multipart/form-data" action="<?= base_url('/admin/product/create') ?>">
          <div class="card-body">
            <div class="form-group">
              <label for="prd_name">Nama</label>
              <input type="text" class="form-control" id="prd_name" placeholder="Enter email" name="prd_name">
            </div>
            <div class="form-group">
              <label for="prd_price">Harga</label>
              <input type="number" class="form-control" id="prd_price" placeholder="Enter Price" name="prd_price">
            </div>
            <div class="form-group">
              <label for="prd_description">Deskripsi</label>
              <input type="text" class="form-control" id="prd_description" placeholder="Enter Description" name="prd_description">
            </div>
            <div class="form-group">
              <label for="prd_stock">Stok</label>
              <input type="number" class="form-control" id="prd_stock" placeholder="Enter Stock" name="prd_stock">
            </div>
            <div class="form-group">
              <label for="prd_image">Gambar</label>
              <input type="file" class="form-control" id="prd_image" name="prd_image">
            </div>
            <div class="form-group">
              <label for="ctr_id">Kategori</label>
              <select class="custom-select form-control-border" id="ctr_id" name="ctr_id">
                <?php foreach ($categories as $category) : ?>
                  <option value="<?= $category['id'] ?>" ><?= $category['ctr_name'] ?></option>
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