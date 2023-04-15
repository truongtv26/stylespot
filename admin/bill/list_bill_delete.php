<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Danh sách đơn hàng</h2>
                <form class="boloc" action="index.php?act=list_bill" method="post">
                    <div class="boloc2 form-group d-flex justify-content-between">
                        <!-- <select style="width: 11rem;" class="form-select" name="id_search_bill" id="tt">
                          <option value="0" selected>Tất cả</option>
                          <option value="">Giày nam</option>
                          <option value="">Giày nam</option>
                        </select> -->
                        <div class="thaotac">
                            <a href="index.php?act=list_bill"><input class="btn btn-primary" type="button" value="Quay lại"></a>
                        </div>
                        <div class="search1 d-flex">
                            <input type="text" name="kyw" id="" class="form-control" placeholder="Search..." style="width:260px" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'">
                            <button style="margin-left: .5rem;" type="submit" class="btn btn-primary" name="search_bill" value="Search">Tìm kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table text-center">
                        <table class="table table-bordered text-center table1">
                            <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Khách hàng</th>
                                <th>Thông tin KH</th>
                                <th>Tổng giá trị</th>
                                <th>Ngày đặt hàng</th>
                                <th>pttt</th>
                                <th>Tình trạng đơn hàng</th>
                                <th style="width: 22%;">Thao tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($listbill ?? [] as $value) {
                                extract($value);
                                // echo '<pre>';
                                // print_r($value);
                                $delete_bill = "index.php?act=delete_bill&id=";
                                if ($pttt == 0) {
                                    $ptdh = "Thanh toán khi nhận";
                                } elseif ($pttt == 1) {
                                    $ptdh = "Thanh toán VNPAY";
                                }
                                ?>
                                <tr>
                                    <td>BILL-<?php echo $bill_id ?></td>
                                    <td><?php echo $fullname ?></td>
                                    <td><?php echo $email ?> <br><?php echo $address ?> <br><?php echo $phone ?> </td>
                                    <td><?php echo $total_money ?></td>
                                    <td> <?php echo $ngaydathang ?></td>
                                    <td><?php echo $ptdh ?></td>
                                    <td>Yêu cầu hủy đơn hàng</td>
                                    <td class="btn1">
                                        <a onclick="return confirm('Xác nhận hủy đơn hàng')" href="index.php?act=confirm_delete_bill&id=<?php echo $bill_id ?>">
                                            <input type="button" class="btn btn-gradient-primary btn2" name="detail" value="Hủy đơn">
                                        </a>
                                        <a onclick="return confirm('Xác nhận tiếp tục')" href="index.php?act=confirm_update_bill&id=<?php echo $bill_id ?>">
                                            <input type="button" class="btn btn-gradient-primary btn2" value="Tiếp tục">
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                            if (empty($listbill))
                                echo "<tr><td colspan='8'>Không có đơn hàng nào yêu cầu hủy</td></tr>";
                            ?>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
}
?>
