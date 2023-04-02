<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm khách hàng</h4>
                <form class="forms-sample" action="index.php?act=add_bill" method="post">
                    <?php
                    if (isset($_SESSION['user_bill'])) {
                        // echo '<pre>';
                        // print_r($_SESSION['user_bill']);
                    }
                    ?>
                    <div class="form-group">
                        <label for="">Tên Khách Hàng</label>
                        <input type="text" name="fullname_bill" class="form-control" id="" value="<?php echo (isset($_SESSION['user_bill']) ? $_SESSION['user_bill'][0] : false) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control" id="" value="<?php echo (isset($_SESSION['user_bill']) ? $_SESSION['user_bill'][1] : false) ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="text" name="phone" class="form-control" id="" value="<?php echo (isset($_SESSION['user_bill']) ? $_SESSION['user_bill'][2] : false) ?>" required>
                    </div>

                    <div class="form-group mt-3">
                        <input class="btn btn-primary" type="submit" name="add_bill_1" value="Thêm Mới">
                        <?php
                        if (isset($_SESSION['user_bill'])) {
                              // echo '<pre></pre>';
                        // print_r($_SESSION['user_bill']);
                        ?>
                            <a href="index.php?act=list_product_bill"><input class="btn btn-primary" type="button" value="Mua hàng"></a>
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>