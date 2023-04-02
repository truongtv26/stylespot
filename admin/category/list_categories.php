<style>
  .thaotac {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  a {
    text-decoration: none;
  }

  td {
    line-height: 40px;
  }

  .btn1 input:nth-child(1) {
    margin-right: 10px;
  }

  .btn2 {
    padding-left: 30px;
    padding-right: 30px;
  }

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách loại hàng</h4>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                <th>Mã loại</th>
                <th>Tên loại</th>
                <th style="width: 22%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>

              <?php
              $categori_all = categori_all();
              foreach ($categori_all as $value) { ?>

                <tr>
                
                  <td><?php echo $value['categori_id'] ?></td>
                  <td><?php echo $value['categori_name'] ?></td>
                  <td class="btn1">
                    <a href="index.php?act=update_category&categori_id=<?php echo $value['categori_id'] ?>">
                      <input class="btn btn-gradient-primary btn2" type="button" value="Sửa">
                    </a>
                    <a href="index.php?act=delete_category&categori_id=<?php echo $value['categori_id'] ?>" onclick="return confirm(`Bạn muốn xóa?`)" id="delete">
                      <input class="btn btn-gradient-danger btn2" type="button" value="Xóa">
                    </a>
                  </td>
                </tr>

              <?php
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="thaotac">
  <div class="">
    <a href="index.php?act=add_category"><input class="btn btn-gradient-primary" type="button" value="Thêm danh mục"></a>
  </div>
</div>
<?php
  if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
  }
  ?>