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
    justify-content: space-between;
    width: 100%;
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
<!-- <?php
      extract($_SESSION['user_bill']);
      echo '<pre>';
      print_r($_SESSION['user_bill']);
      ?> -->
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Danh sách sản phẩm</h2>
        <form class="boloc form-group" action="" method="post">

          <div class="boloc2 form-group">
            <div class="thaotac">
              <?php
              $count_admin_cart = 0;
              $count_admin_cart = count($_SESSION['admin_cart']);
              ?>
              <a href="index.php?act=addtocart1"><input class="btn btn-primary" type="button" value="Thanh toán(<?= $count_admin_cart ?>)"></a>
            </div>
            <div class="search1 d-flex">
              <input type="text" name="kyw" id="" class="form-control" placeholder="Search..." style="width:260px" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'">
              <button type="submit" class="btn btn-primary" name="search_bill" value="Search">Tìm kiếm</button>
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <table class="table text-center">
            <table class="table table-bordered text-center table1">
              <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th></th>
                  <th style="width: 10%;">Giá</th>
                  <th>Số lượng</th>
                  <th>Size</th>
                  <th style="width: 10%;">Thành tiền</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>

                <tr>
                  <?php
                  foreach ($list_product as $product) {
                    extract($product);
                  ?>
                    <form action="index.php?act=addtocart&product_id=<?= $product_id ?>" method="post">
                      <td><?= $product_name ?></td>
                      <td><img src="./../upload/<?= $img ?>" alt=""></td>
                      <td><input style="border: none;text-align: center;" type="text" name="price" value="<?= $price ?>"></td>
                      <td style="width: 10%;"><input class="form-control" onchange="count_money()" type="number" name="amount" min="1" id="" value="1" max="10"></td>
                      <td style="width: 12%;">
                        <select class="form-select" name="pr_size" id="">
                          <option value="Chọn size">Chọn size</option>
                          <?php
                          $list_size = load_product_size($product_id);
                          foreach ($list_size as $size) {
                            extract($size);
                          ?>
                            <option value="<?= $pr_size ?>"><?= $pr_size ?></option>
                          <?php
                          }
                          ?>

                        </select>
                      </td>
                      <td><input style="border: none;text-align: center;" type="text" name="total_price" value="0"></td>
                      <input type="hidden" name="product_name" value="<?= $product_name ?>">
                      <input type="hidden" name="price" value="<?= $price ?>">
                      <input type="hidden" name="img" value="<?= $img ?>">
                      <td> <button type="submit" name="addcart" class="btn primary-btn"><i class="fa-solid fa-cart-plus"></i></button></td>
                </tr>
                </form>
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
<script>
  function count_money() {
    let amount = document.getElementsByName("amount");
    let price = document.getElementsByName("price");
    let total_price = document.getElementsByName("total_price");
    for (var i = 0; i < price.length; i++) {
      total_price[i].value = price[i].value * amount[i].value;
      console.log(total_price[i].value);
    };

  }
  let amount = document.getElementsByName("amount");
  let price = document.getElementsByName("price");
  let total_price = document.getElementsByName("total_price");
  for (var i = 0; i < price.length; i++) {
    total_price[i].value = price[i].value * amount[i].value;
    console.log(total_price[i].value);
  }
</script>