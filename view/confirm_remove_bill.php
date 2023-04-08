

<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
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
                    foreach ($list_img_cart as $item_cart):
                        ?>
                        <tr>
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

                                    echo "<p>Chờ xác nhận</p>";
                                    echo "<a style='border-radius: .5rem;' class='danger-btn text-nowrap' onclick=\"return confirm('Xác nhận hủy đơn hàng')\" href='index.php?act=delete_bill&bill_id=$bill_id''>Hủy đơn hàng</a>";

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
