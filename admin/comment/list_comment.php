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

  .boloc {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    margin-bottom: 15px;
  }

  .boloc2 {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .boloc select {
    height: 38px;
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
        <h4 class="card-title">Danh sách bình luận</h4>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>
                
                <th>ID</th>
                <th>Username</th>
                <th>Nội dung</th>
                <th>Mã sản phẩm</th>
                <th>Ngày bình luận</th>
                <th style="width: 17%;">Thao tác</th>
              </tr>

            </thead>
            <tbody>
              <?php
              foreach ($listbl as $value) {
                extract($value);
                $delete_comment = "index.php?act=delete_comment&id=".$comment_id;
              ?>
                <tr>
                 
                  <td><?php echo $comment_id ?></td>
                  <td><?php echo $username?></td>
                  <td><?php echo $content ?></td>
                  <td><?php echo $product_id ?></td>
                  <td> <?php echo $date_comment ?></td>
                  <td class="btn1">
                    <a href="<?php echo $delete_comment ?>" onclick="return confirm(`Bạn muốn xóa?`)" ; id="delete">            
                    <input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a>
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
<?php
  if (isset($thongbao) && ($thongbao != "")) {
    echo $thongbao;
  }
  ?>