<?php foreach ($products as $product) : ?>
  <form action="/cart/add" method="POST">
    <?=$product['id']?>
    <?=$product['prd_name']?>
    <input name="prd_id" type="hidden" value="<?=$product['id']?>">
    <input name="prd_name" type="hidden" value="<?=$product['prd_name']?>">
    quantity: <input name="quantity" type="number" value="0">
    <button type="submit">Add to cart</button>
  </form>
<?php endforeach ?>
