<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật đơn hàng</h4>
        <form class="forms-sample" action="index.php?act=updatebill&id=<?php echo $id ?>" method="post">
          <div class="form-group">
            <label for="">Mã đơn hàng</label>
            <input disabled name="bill_id" value="<?php echo $_GET['id'] ?>" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="bill_status">Tình trạng đơn hàng</label>
            <?php 
            extract($load_one_bill);
            // var_dump($load_one_bill);
            // echo $load_one_bill;
             ?>
            <select name="bill_status" id="" class="form-select">
              <option value="0">Đơn hàng mới</option>
              <option value="1">Đang xử lý</option>
              <option value="2">Đang giao </option>
              <option value="3">Đã hoàn thành</option>
            </select>
          </div>
          <div class="form-group mt-3">
            <input type="hidden" name="id_bill" value="<?php echo $bill_id ?>">
            <input class="btn btn-primary" type="submit" name="capnhat_bill" value="Cập nhật">
            <a href="index.php?act=list_bill"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>
      </div>
    </div>
  </div>