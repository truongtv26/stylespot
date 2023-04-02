<style>
  .thaotac {
    display: flex;
    flex-direction: row;
    gap: 10px;
  }

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
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
</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card" id="categori">
      <div class="card-body">
        <h2 class="card-title">Thống kê sản phẩm theo danh mục</h2>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <th>Mã danh mục</th>
              <th>Tên danh mục</th>
              <th>Số lượng</th>
              <th>Giá cao nhất</th>
              <th>Giá thấp nhất</th>
              <th>Giá trung bình</th>
            </thead>
            <tbody>
              <?php
              foreach ($listthongke as $thongke) {
                extract($thongke);
                echo '
              <tr>
                <td>' . $categori_id . '</td>
                <td>' . $categori_name . '</td>
                <td>' . $countpr . '</td>
                <td>' . $maxprice . '</td>
                <td>' . $minprice . '</td>
                <td>' . round($avgprice,2) . '</td>
              </tr>
              ';
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card" id="date">
      <div class="card-body">
        <h2 class="card-title">Thống kê đơn hàng theo ngày</h2>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <th>Ngày</th>
              <th>Số đơn hàng</th>
              <th>Doanh thu</th>
            </thead>
            <tbody>
              <?php
              foreach ($count_bill as $bill) {
                extract($bill);
                echo '
              <tr>
                <td>' . $ngaydathang . '</td>
                <td>' . $amount_bill . '</td>
                <td>$ ' . $total_bill . '</td>
              </tr>
              ';
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card" id="date">
      <div class="card-body">
        <h2 class="card-title">Sản phẩm bán chạy nhất</h2>
        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <th>Sản phẩm</th>
              <th>Số lượng đặt hàng</th>
            </thead>
            <tbody>
              <?php
              foreach ($product_best_seller as $bill) {
                extract($bill);
                echo '
              <tr>
                <td>' . $product_name . '</td>
                <td>' . $best_seller . '</td>
              </tr>
              ';
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
    <a href="index.php?act=chart"><input class="btn btn-primary" type="button" value="Xem Biểu đồ"></a>
  </div>
</div>