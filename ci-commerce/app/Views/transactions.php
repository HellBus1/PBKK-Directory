<?php foreach ($orders as $order) : ?>
  <?=$order['ord_date']?>
  <?=$order['ord_total_penjualan']?>
  <?=$order['ord_alamat']?>
  <a href="/transactions/<?=$order['id']?>">Detail</a>
<?php endforeach ?>
