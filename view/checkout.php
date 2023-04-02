<!-- End Header Area -->
<style>
    #vnpay-button {
        display: none;
    }
</style>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Giỏ hàng</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="single-product.php">Giỏ hàng</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<form action="index.php?act=confirmation" method="post">
    <section class="checkout_area section_gap">
        <div class="container">
            <div class="returning_customer">
                <div class="billing_details">
                    <div class="row">
                        <?php
                        if (isset($_SESSION)) {
                            extract($_SESSION);
                        }
                        ?>
                        <div class="col-lg-8">
                            <h3>Thông tin khách hàng</h3>
                            <div class="row contact_form">
                                <div class="col-md-12 form-group">
                                    <label for="user" class="form-lable">Tên khách hàng</label>
                                    <input type="text" class="form-control" id="user" name="username"
                                           value="<?= $username['username'] ?? '' ?>" placeholder="Tên khách hàng"
                                           required>
                                    <span class="text-danger"><?= !empty($error['username']) ? $error['username'] : '' ?></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <label for="number" class="form-lable">số điện thoại</label>
                                    <input type="text" class="form-control" id="number" name="phone"
                                           value="<?= $phone ?? '' ?>" pattern="^(84|0[35789])[0-9]{8}$"
                                           oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')"
                                           onchange="this.setCustomValidity('')"
                                           required>
                                    <span class="text-danger"><?= !empty($error['phone']) ? $error['phone'] : '' ?></span>
                                </div>
                                <div class="col-md-6 form-group p_star">
                                    <label for="email" class="form-label">địa chỉ email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="<?= $email ?? '' ?>"
                                           pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$""
                                           oninvalid="this.setCustomValidity('Vui lòng nhập email')"
                                           onchange="this.setCustomValidity('')"
                                           required>
                                    <span class="text-danger"><?= !empty($error['email']) ? $error['email'] : '' ?></span>
                                </div>
                                <div class="col-md-12 form-group p_star">
                                    <label for="address" class="form-lable">Địa chỉ nhận hàng</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           value="<?= $address ?? '' ?>" placeholder="địa chỉ nhận hàng" minlength="5" required>
                                    <span class="text-danger"><?= !empty($error['address']) ? $error['address'] : '' ?></span>
                                </div>
                            </div>
                            <section class="cart_area">
                                <h3>Sản phẩm trong đơn hàng</h3>
                                <?php
                                if (!empty($_SESSION['fake_cart'])) {
                                    ?>
                                    <table class="table table-striped table-bordered text-center">
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
                                        $total_price = 0;
                                        $i = 0;
                                        foreach ($_SESSION['fake_cart'] as $value) {
                                            // echo '<pre>';
                                            // print_r($value);
                                            $total = $value[2] * $value[4];
                                            $total_price = $total_price + $total;
                                            ?>
                                            <tr>
                                                <td><?= $value[1] ?></td>
                                                <td><img width="70px" src="<?= $value[3] ?>" alt="anh"></td>
                                                <td><?= $value[2] ?></td>
                                                <td><?= $value[4] ?></td>
                                                <td><?= $value[5] ?></td>
                                                <td><a onclick="return confirm('Bạn muốn xóa sản phẩm')"
                                                       href="index.php?act=delete_checkout&cart_id=<?= $i++ ?>">xóa</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php
                                } else {
                                    ?>
                                    <h5 class="text-center">Chưa có sản phẩm nào</h5>
                                    <?php
                                }
                                ?>
                            </section>
                        </div>
                        <div class="col-lg-4">
                            <div>
                                <div class="order_box">
                                    <h2>Hóa đơn</h2>

                                    <ul class="list">
                                        <li><a>Sản phẩm<span>Tổng</span></a></li>
                                        <?php
                                        $total_price = 0;
                                        foreach ($_SESSION['fake_cart'] as $value) {
                                            // extract($value);
                                            // echo '<pre>';
                                            // print_r($value);
                                            // echo 'hello';
                                            $total = $value[2] * $value[4];
                                            $total_price = $total_price + $total;
                                            ?>
                                            <li><a><?= $value[1] ?> <span class="middle">x <?= $value[4] ?></span> <span
                                                            class="last">$ <?= $total ?></span></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>

                                    <ul class="list list_2">
                                        <li><a>Tổng tiền <span>$ <?= $total_price ?></span></a></li>
                                        <li><a>Vận chuyển <span>Flat rate: $50.00</span></a></li>
                                        <li><a>Thành tiền <span>$ <?= $total_price + 50 ?></span></a></li>
                                    </ul>
                                    <div class="payment_item">
                                        <div class="radion_btn">
                                            <input type="radio" class="payment" checked id="f-option5" name="pttt"
                                                   value="0">
                                            <label for="f-option5">Thanh toán khi nhận hàng</label>
                                            <div class="check"></div>
                                        </div>
                                    </div>
                                    <div class="payment_item active mt-2 ">
                                        <div class="radion_btn">
                                            <input type="radio" class="vnpay" id="f-option6" name="pttt" value="1">
                                            <input type="hidden" name="redirect">
                                            <label for="f-option6">VNPAY </label>
                                            <div class="check"></div>
                                        </div>
                                        <div id="vnpay-button"></div>
                                    </div>
                                    <div class="d-flex flex-column form-group">
                                        <input type="hidden" id="total_price" value="<?= $total_price + 50 ?>">
                                        <a href="index.php"><input class="btn primary-btn form-control"
                                                                   value="Shopping"></a>
                                        <?php
                                        if (isset($_SESSION['fake_cart']) && count($_SESSION['fake_cart']) > 0) {
                                            ?>
                                            <a href=""><input class="btn primary-btn form-control mt-2" type="submit"
                                                              name="order_bill" value="Hoàn tất đặt hàng"></a>
                                            <a href="index.php?act=delete_all_checkout"
                                               onclick="return confirm('Xóa giỏ hàng')"><input
                                                        class="btn btn-close-white form-control mt-2"
                                                        value="Xóa giỏ hàng"></a>
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
    </section>
</form>

<!--================End Checkout Area =================-->

<!-- start footer Area -->

<!-- End footer Area -->

</body>
