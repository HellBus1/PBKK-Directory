<?= $this->extend('templates/app') ?>
<?= $this->section('content') ?>
  <div class="row">
    <?php foreach ($products as $product) : ?>
      <div class="col-3">
        <div class="card">
          <img src="<?= base_url($product["prd_image"]) ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <form action="/cart/add" method="POST">
              <h5 class="card-title"><?=$product['prd_name']?></h5>
              
              <input name="prd_id" type="hidden" value="<?=$product['id']?>">
              <input name="prd_name" type="hidden" value="<?=$product['prd_name']?>">
              <p class="card-text">
                <label for="quantity" class="form-label">Quantity</label>
                <input name="quantity" class="form-control" type="number" value="0">
              </p>
              <div class="gap-2 d-grid">
                <button class="btn btn-primary" type="submit">Add to cart</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php endforeach ?>
  </div>
<?= $this->endSection() ?>