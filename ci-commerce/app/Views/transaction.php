list barang:
<?php foreach ($order_products as $order_product) : ?>
  <?=$order_product['prd_name']?>
  <?=$order_product['prd_price']?>
  <?=$order_product['orp_amount']?>
<?php endforeach ?>
<br>
<?=$order['ord_date']?>
<?=$order['ord_total_penjualan']?>
<?=$order['ord_alamat']?>
