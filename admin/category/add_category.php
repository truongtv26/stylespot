<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Thêm mới loại hàng</h4>

        <form class="forms-sample" action="index.php?act=add_category" method="POST">
          <div class="form-group">
            <label for="">Mã loại</label>
            <input disabled name="categori_id" type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Tên loại
            </label>
            <input name="categori_name" type="text" class="form-control" required>
          </div>
          <div class="form-group mt-3">
            <input class="btn btn-gradient-primary me-2" type="submit" name="btn_add_categori" value="Thêm mới">
            <input class="btn btn-secondary" type="reset" name="reset" value="Nhập lại">
            <a href="index.php?act=list_category"><input class="btn btn-primary" type="button" value="Danh sách"></a>
          </div>
        </form>

      </div>
    </div>
  </div>
  <?php
  if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
  }
  ?>