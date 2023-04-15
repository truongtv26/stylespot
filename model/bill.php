<?php

function load_all_bill($kyw = "", $user_id = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($kyw != "") {
        $sql .= " AND bill_id like '%" . $kyw . "%'";
    }
    if ($user_id > 0) {
        $sql .= " AND user_id ='" . $user_id . "' ";
    }
    $sql .= " AND status != -1 ORDER BY bill_id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function load_all_bill_delete($kyw = "", $user_id = 0)
{
    $sql = "SELECT * FROM bill WHERE 1";
    if ($kyw != "") {
        $sql .= " AND bill_id like '%" . $kyw . "%'";
    }
    if ($user_id > 0) {
        $sql .= " AND user_id ='" . $user_id . "' ";
    }
    $sql .= " AND status = -1 ORDER BY bill_id desc";
    $listbill = pdo_query($sql);
    return $listbill;
}
function delete_bill($bill_id)
{
    $sql = "DELETE FROM cart WHERE `bill_id` = {$bill_id}";
    pdo_execute($sql);

    $sql = "DELETE FROM bill WHERE `bill_id` = {$bill_id}";
    pdo_execute($sql);
}
function update_bill($stt, $id)
{
    $sql = "UPDATE bill SET status= '" . $stt . "' WHERE bill_id =" . $id;
    pdo_execute($sql);
}
function load_one_bill($id)
{
    $sql = "SELECT * FROM bill WHERE bill_id=" . $id;
    $one_bill = pdo_query_one($sql);
    return $one_bill;
}
function load_bill_detail($id)
{
    $sql = "SELECT cart.product_name, cart.price,cart.size_id, cart.amount, bill.total_money, product.img,bill.bill_id FROM bill JOIN cart ON bill.bill_id=cart.bill_id JOIN product ON cart.product_id=product.product_id WHERE bill.bill_id=" . $id;
    $one_bill = pdo_query($sql);
    return $one_bill;
}
//alo
function insert_bill($username, $email, $address, $phone, $total_money, $pttt, $status, $user_id, $ngaydathang)
{
    $sql = "INSERT INTO `bill` (`fullname`, `email`, `address`, `phone`, `total_money`, `pttt`, `status`, `user_id`, `ngaydathang`) VALUES ('$username', '$email', '$address', '$phone', '$total_money', '$pttt', '$status', '$user_id', '$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_new_bill($username, $address, $phone, $total_money, $pttt, $status, $user_id, $ngaydathang)
{
    $sql = "INSERT INTO `bill` (`fullname`, `address`, `phone`, `total_money`, `pttt`, `status`, `user_id`, `ngaydathang`) VALUES ('$username', '$address', '$phone', '$total_money', '$pttt', '$status', '$user_id', '$ngaydathang')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($user_id, $price, $amount, $product_id, $size_id, $bill_id, $product_name)
{
    // $sql = "INSERT INTO `cart` (`user_id`, `price`, `amount`, `product_id`, `size_id`, `bill_id`) VALUES ('$user_id', '$price', '$amount', '$product_id', '$size_id','$bill_id')";
    $sql = "INSERT INTO `cart` (`user_id`, `price`, `amount`, `product_id`, `size_id`, `bill_id`,`product_name`) VALUES ('$user_id', '$price', '$amount', '$product_id',$size_id, '$bill_id','$product_name')";
    return pdo_execute($sql);
}
function list_cart($bill_id)
{
    $sql = "SELECT * FROM `cart` WHERE `cart`.`bill_id`=" . $bill_id;
    $cart =  pdo_query($sql);
    return $cart;
}
//đếm số sản phẩm
function count_cart($bill_id)
{
    $sql = "SELECT * FROM `cart` WHERE `cart`.`bill_id`=" . $bill_id;
    $cart =  pdo_query($sql);
    return sizeof($cart);
}
function total_cart()
{
    $total_price = 0;
    foreach ($_SESSION['fake_cart'] as $cart) {
        $total_price += $cart[2];
    }
    return $total_price + 50;
}
function total_cart_admin(){
    $total_price = 0;
    foreach ($_SESSION['admin_cart'] as $cart) {
        $total = $cart[3] * $cart[4];
        $total_price += $total;
    }
    return $total_price + 50;
}
function list_img_cart($user_id)
{
    $sql = "SELECT * FROM `cart` JOIN `product` ON `cart`.`product_id` = `product`.`product_id` JOIN `bill` ON `cart`.`bill_id`=`bill`.`bill_id`  WHERE `cart`.`user_id`=" . $user_id . " ORDER BY bill.bill_id DESC";
    $list_img_cart = pdo_query($sql);
    return $list_img_cart;
}
function list_img_cart_not_login($user_id, $keyword)
{
    $sql = "SELECT * FROM `cart` JOIN `product` ON `cart`.`product_id` = `product`.`product_id` JOIN `bill` ON `cart`.`bill_id`=`bill`.`bill_id` WHERE `cart`.`user_id`= '$user_id'";
    if (is_numeric($keyword)) {
        $sql .= " AND `phone` = '$keyword'";
    } else {
        $sql .= " AND `email` = '$keyword'";
    }
    $sql .= " ORDER BY bill.bill_id DESC";
    $list_img_cart = pdo_query($sql);
    return $list_img_cart;
}



