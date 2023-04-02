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

  .btn3 {
    background-color: red;
  }

  .btn3:hover {
    opacity: 0.7;
    background-color: red;
  }
</style>
<?php
foreach ($detail_bill as $bill) {
  // extract($bill);
  // echo '<pre>';
  // print_r($bill);
}
?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <a href="index.php?act=list_bill"><input class="btn btn-primary mb-2" type="button" value="Đơn hàng"></a>
        <h2 class="card-title">Chi tiết đơn hàng BILL-<?= $bill[6] ?></h2>
        <div class="table-responsive">
          <table class="table text-center">
            <table class="table table-bordered text-center table1">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Sản phẩm</th>
                  <th>Size</th>
                  <th>Đơn giá</th>
                  <th>Số lượng</th>
                  <th>Thành tiền</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($detail_bill as $bill) {
                  extract($bill);
                  // echo '<pre>';
                  // print_r($bill);
                  $total = $bill[1] * $bill[3];
                ?>
                  <tr>
                    <td><?= $bill[0] ?></td>
                    <td><img src="../upload/<?= $bill[5] ?>" width="100px" alt=""></td>
                    <td><?= $bill[2] ?></td>
                    <td><?= $bill[1] ?></td>
                    <td><?= $bill[3] ?></td>
                    <td><?= $total ?></td>
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