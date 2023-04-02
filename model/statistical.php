<?php
function load_all_statistical()
{
  $sql = "SELECT categori.categori_id as categori_id,categori.categori_name as categori_name,COUNT(product.product_id) as countpr,MIN(product.price) as minprice,MAX(product.price) as maxprice,AVG(product.price) as avgprice  FROM product JOIN categori ON categori.categori_id=product.categori_id GROUP BY categori.categori_id ORDER BY categori.categori_id DESC";
  $list_statistical = pdo_query($sql);
  return $list_statistical;
}
function count_bill()
{
  $sql = "SELECT bill.ngaydathang, COUNT(bill.bill_id) as amount_bill, SUM(bill.total_money) as total_bill FROM bill GROUP BY bill.ngaydathang ORDER BY bill.ngaydathang DESC";
  $count_bill = pdo_query($sql);
  return $count_bill;
}
function product_best_seller()
{
  $sql = "SELECT cart.product_name, SUM(cart.amount) as best_seller FROM cart GROUP BY cart.product_name ORDER BY count(cart.amount) DESC LIMIT 1";
  $product_best_seller = pdo_query($sql);
  return $product_best_seller;
}
