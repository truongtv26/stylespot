<!-- End Header Area -->

<!-- back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/back_to_top.png" title='lên đầu trang' width='20px'
                                              height="20px"/></button>
<!--end back to top-->
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Giỏ hàng của tôi</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?act=cart">Giỏ hàng của tôi</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->
<?php
if (empty($_SESSION['username'])){
?>

<form class="container" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="GET">
    <div class="d-flex flex-column">
        <label for="keyword" class="form-label">Nhập số điện thoại hoặc email mua hàng</label>
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Số điện thoại hoặc email">
        <button class="primary-btn" style="border: none; border-radius: 2px; margin-top: 10px;">Tìm kiếm</button>
    </div>
    <input type="hidden" name="act" value="mycart">
</form>
<?php
}?>
<?php
if (isset($_GET['keyword']) && $_GET['keyword']) {
    $key = $_GET['keyword'];
    if(!empty($list_img_cart))
        echo "<h2 style='text-align:center; margin-top: 5px'>Kết quả tìm kiếm cho '$key' </h2>";
    else
        echo "<h2 style='text-align:center; margin-top: 5px'>Không có đơn hàng nào khớp với '$key' </h2>";

}
?>
<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <td>STT</td>
                        <td colspan="4">
                            <div class="row">
                                <div class="col-6">Sản phẩm</div>
                                <div class="col-2">Giá</div>
                                <div class="col-2">Số lượng</div>
                                <div class="col-2">Size</div>
                            </div>
                        </td>
                        <td>Vận chuyển</td>
                        <td>Tổng</td>
                        <td>Status</td>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stt = 0;
                    foreach ($list_img_cart as $item_cart):
                        ++$stt;
                        ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td colspan="4">
                                <?php
                                foreach ($item_cart as $bill_detail):
                                    extract($bill_detail);
                                    ?>
                                    <div class="row align-items-center">
                                        <div class="col-6">
                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="./upload/<?= $img ?>" alt="" width="100">
                                                </div>
                                                <div class="media-body">
                                                    <p><?= $product_name ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 font-weight-bold">$<?= $price ?></div>
                                        <div class="col-2 font-weight-bold"><?= $amount ?></div>
                                        <div class="col-2 font-weight-bold"><?= $size_id ?></div>
                                    </div>
                                <?php
                                endforeach;
                                ?>
                            </td>
                            <td class="font-weight-bold">$50</td>
                            <td class="font-weight-bold">$<?= $total_money ?></td>
                            <!--trang thai-->
                            <td class="font-weight-bold d-flex flex-column justify-content-end align-items-center">
                                <?php
                                if ($status == 0) {
                                    $btn = "<a style='border-radius: .5rem;' class='danger-btn text-nowrap' onclick=\"return confirm('Xác nhận hủy đơn hàng')\" href='index.php?act=delete_bill&bill_id=$bill_id''>Hủy đơn hàng</a>";

                                    echo "<p>Chờ xác nhận</p>";
                                    echo $btn;
                                } else if ($status == 1)
                                    echo "<p>Đang xử lý</p>";
                                else if ($status == 2)
                                    echo "<p>Đang giao hàng</p>";
                                else if ($status == 3) {
                                    echo "<p>Đã hoàn thành</p>";
                                    echo "<a style='border-radius: .5rem;' class='primary-btn text-nowrap' href='index.php?act=detail&product_id=$product_id'>Đánh giá</a>";
                                }

                                ?>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->

</body>