<?php
function load_all_statistical()
{
    $sql = "SELECT categori.categori_id as categori_id,categori.categori_name as categori_name,COUNT(product.product_id) as countpr,MIN(product.price) as minprice,MAX(product.price) as maxprice,AVG(product.price) as avgprice  FROM product JOIN categori ON categori.categori_id=product.categori_id GROUP BY categori.categori_id ORDER BY categori.categori_id DESC";
    $list_statistical = pdo_query($sql);
    return $list_statistical;
}

function count_bill()
{
    $sql = "SELECT bill.ngaydathang, COUNT(bill.bill_id) as amount_bill, 
       SUM(bill.total_money) as total_bill 
FROM bill GROUP BY bill.ngaydathang ORDER BY bill.ngaydathang DESC";
    $count_bill = pdo_query($sql);
    return $count_bill;
}

function product_best_seller()
{
    $sql = "SELECT cart.product_name, SUM(cart.amount) as best_seller FROM cart GROUP BY cart.product_name ORDER BY count(cart.amount) DESC LIMIT 1";
    $product_best_seller = pdo_query($sql);
    return $product_best_seller;
}

function best_selling_by_month()
{
    $sql = "SELECT t.product_name, t.month, t.total_quantity FROM (
    SELECT c.product_id, c.product_name, EXTRACT(MONTH FROM STR_TO_DATE(b.ngaydathang, '%d/%m/%Y')) AS month, SUM(c.amount) AS total_quantity
    FROM cart AS c 
    JOIN bill as b ON b.bill_id = c.bill_id
    GROUP BY c.product_id, EXTRACT(MONTH FROM STR_TO_DATE(b.ngaydathang, '%d/%m/%Y'))
    ORDER BY total_quantity DESC
    ) as t
ORDER BY month DESC";
    return pdo_query($sql);
}


/**
SELECT
c.product_id,
c.product_name,
EXTRACT(MONTH FROM STR_TO_DATE(b.ngaydathang, '%d/%m/%Y')) AS month,
SUM(c.amount) AS total_quantity
FROM
cart AS c
JOIN bill as b ON b.bill_id = c.bill_id
GROUP BY
c.product_id,
EXTRACT(MONTH FROM STR_TO_DATE(b.ngaydathang, '%d/%m/%Y'))
 */