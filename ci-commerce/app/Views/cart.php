<?php $total = 0 ?>

<?php foreach ($order_products as $order_product) : ?>
  <?=$order_product['id']?>
  <?=$order_product['prd_name']?>
  <?=$total += ($order_product['prd_price'] * $order_product['orp_amount'])?>
  <a href="/cart/delete/<?=$order_product['id']?>">delete</a>
<?php endforeach ?>

<?=$total?>
<form action="/checkout" method="POST">
  <input type="hidden" name="total" value="<?=$total?>">
  alamat: <input name="address" type="text">

  <button type="submit">Checkout</button>
</form>
