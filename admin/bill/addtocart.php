<style>
    .order_box {
        border: 1px solid #eee;
        padding: 1rem;
        border-radius: .5rem;
    }

    .card-body {
        display: flex;
        gap: 1rem;
    }

    a {
        text-decoration: none;
        color: red;
    }

    .table1 thead tr th {
        font-weight: 600;
        font-size: 1rem;
    }

    ul {
        list-style: none;
    }

    #vnpay-button {
        display: none;
    }
</style>
<!--================Checkout Area =================-->
<section class="checkout_area section_gap">

    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <?php
                    extract($_SESSION['user_bill']);

                    ?>
                    <div class="col-lg-9">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="index.php?act=confirmation" method="POST"
                              novalidate="novalidate">
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="user" name="username"
                                       value="<?= $_SESSION['user_bill'][0] ?>">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="number" name="phone"
                                       value="<?= $_SESSION['user_bill'][1] ?>">
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control" id="user" name="address"
                                       value="<?= $_SESSION['user_bill'][2] ?>">
                            </div>
                        </form>
                        <section class="cart_area">
                            <h3>Your Order</h3>
                            <?php
                            if (count($_SESSION['admin_cart']) > 0) {
                                ?>
                                <table class="table1 table table-striped table-bordered text-center">
                                    <thead>
                                    <tr>
                                        <th scope="col">Sản phẩm</th>
                                        <th>Ảnh</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Size</th>
                                        <th>Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $i = 0;
                                    $total_bill = 0;
                                    foreach ($_SESSION['admin_cart'] as $cart) {
                                        extract($cart);
                                        $delete_cart = "index.php?act=delete_cart&id=" . $i++;
                                        $total_price = $cart[3] * $cart[4];
                                        $total_bill += $total_price;
                                        ?>
                                        <tr>
                                            <td><?= $cart[1] ?></td>
                                            <td><img width="70px" src="./../upload/<?= $cart[2] ?>" alt="anh"></td>
                                            <td><?= $cart[4] ?></td>
                                            <td><?= $cart[3] ?></td>
                                            <td><?= $cart[5] ?></td>
                                            <td><a onclick="return confirm('Bạn muốn xóa sản phẩm')"
                                                   href="<?= $delete_cart ?>">xóa</a></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    </form>
                                </table>
                                <?php
                            } else {
                                echo '<h4 class="text-center mt-2">Chưa có sản phẩm nào</h4>';
                            }
                            ?>
                            <!-- <h5 class="text-center">Chưa có sản phẩm nào</h5> -->
                        </section>
                    </div>
                    <div class="col-lg-3">
                        <form action="index.php?act=confirmation" method="POST">
                            <div class="order_box">
                                <?php
                                foreach ($_SESSION['admin_cart'] as $cart) {
                                    extract($cart);
                                    $count_bill = count($_SESSION['admin_cart']);
                                }
                                ?>
                                <h2>Your Order (<?php
                                    if (isset($count_bill)) {
                                        echo $count_bill;
                                    } else {
                                        echo '0';
                                    }
                                    ?>)</h2>
                                <ul class="list list_2">
                                    <li><a>Subtotal
                                            <span>$ <?php echo (isset($total_bill)) ? $total_bill : '0' ?></span></a>
                                    </li>
                                    <li><a>Shipping <span>Flat rate: $50.00</span></a></li>
                                    <li><a>Total
                                            <span>$ <?php echo (isset($total_bill)) ? $total_bill + 50 : '0' ?></span></a>
                                    </li>
                                </ul>
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" class="payment" checked id="f-option5" name="pttt"
                                               value="0">
                                        <label for="f-option5">Check payments</label>
                                        <div class="check"></div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column form-group mt-3">
                                    <input type="hidden" id="total_price" value="<?= $total_bill + 50 ?>">
                                    <a href="index.php?act=list_product_bill"><input
                                                class="btn btn-primary form-control" value="Shopping"></a>
                                    <a href=""><input class="btn btn-primary form-control mt-2" type="submit"
                                                      name="order_bill" value="Hoàn tất đơn hàng"></a>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
