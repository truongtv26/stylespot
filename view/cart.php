<!-- End Header Area -->

<!-- back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/buttonTop.png" title='lên đầu trang' width='20px' height="20px" /></button>
<!--end back to top-->
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Sản phẩm yêu thích</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?act=cart">Sản phẩm yêu thích</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table">
                <?php
                if (!empty($_SESSION['mycart'])) {
                ?>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col"></th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <form action="index.php?act=checkout" method="post" novalidate>
                            <tbody>
                                <?php
                                $i = 0;
                                $total_price = 0;
                                foreach ($_SESSION['mycart'] as $value) {
                                    // echo '<pre>';
                                    // print_r($_SESSION['mycart']);
                                    // echo '<pre/>';
                                    $anh = "upload/" . $value[3];

                                ?>
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="<?= $anh ?>" width="100px">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $value[1] ?></p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <input style="border: none;background-color: #fff;" type="text" name="price" id="" value="<?= $value[2] ?>">
                                        </td>
                                        <td> <a class="btn primary-btn" style="border-radius: 10px;" href="index.php?act=detail&product_id=<?= $value[0] ?>">Mua</a> </td>
                                        <td> <a onclick="return confirm('Bạn muốn xóa sản phẩm')" href="index.php?act=delete_cart&cart_id=<?= $i++ ?>">xóa</a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                                <tr class="out_button_area">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <input type="hidden" name="product_name" value="<?= $value[1] ?>">
                                            <input type="hidden" name="product_price" value="<?= $value[2] ?>">
                                            <input type="hidden" name="product_img" value="<?= $anh ?>">
                                            <input type="hidden" name="product_id" value="<?= $value[0] ?>">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </form>
                    </table>
                <?php
                } else {
                ?>
                    <h3 class="text-center">No product</h3>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
</body>
<script>
    function count_price() {
        let amount = document.getElementsByName("product_amount");
        let size = document.getElementsByName("size_id");
        let price = document.getElementsByName("price");
        let total = document.getElementsByName("total_price");
        let total_bill = document.getElementById("total_bill");
        for (var i = 0; i < size.length; i++) {
            // console.log(price[i].value);
            // console.log(amount[i].value);
            // console.log(size[i].value);
            total[i].value = price[i].value * amount[i].value;
            // console.log(total[i].value);


        };
        var a = 0;
        for (var i = 0; i < size.length; i++) {
            console.log(Number(total[i].value));
            a += Number(total[i].value);
            console.log('a ' + a);
        };
        total_bill.value = a;

    }
</script>