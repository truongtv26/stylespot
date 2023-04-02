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

  .table1 thead tr th {
    font-weight: 600;
    font-size: 1rem;
  }


  .table1 thead tr th:nth-child(6) td {
    width: 200px;
    word-break: break-all;
  }

  .btn2 {
    padding-left: 30px;
    padding-right: 30px;
  }

  .boloc2 {
    display: flex;
    justify-content: space-between;
  }

  .boloc select {
    height: 38px;
  }

  .list_page {
    margin-top: 1rem;
  }

  .list_page ul {
    display: flex;
    justify-content: end;
    gap: 10px;
    list-style: none;
  }

  .list_page ul li {
    background-color: grey;
    padding: 0.2rem 0.6rem;
    border-radius: .3rem;
  }

  .list_page ul li a {
    color: #FFFFFF;
  }
</style>

<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title">Danh sách sản phẩm</h2>
        <form class="boloc" action="index.php?act=list_product" method="post">
          <div class="boloc2 form-group">
            <div class="thaotac">
              <a href="index.php?act=add_product"><input class="btn btn-gradient-primary" type="button" value="Thêm sản phẩm"></a>
            </div>
            <div class="boloc3 d-flex">
              <select name="categori_id" id="" class="form-select" style="height:50px ; width:100px;padding:5px 10px;border:1px solid #ebedf2">
                <option value="">Tất cả</option>
                <?php
                foreach ($list_categori as $value) {
                  extract($value);
                ?>
                  <option value="<?php echo $categori_id ?>"><?php echo $categori_name ?></option>
                <?php
                }
                ?>
              </select>
              <input type="text" name="kyw" class="form-control" placeholder="Search..." style="width:260px;margin: 0 10px;" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'">
              <button type="submit" class="btn btn-gradient-primary" name="search_dm" value="Search">Search</button>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table text-center table-bordered table1">
            <thead>
              <tr>

                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Image</th>
                <th>Mô tả</th>


                <th style="width: 22%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($list_product as $list_product) {
                extract($list_product);
                $update_pr = "index.php?act=update_pr&product_id=" . $product_id;
                $delete_pr = "index.php?act=delete_pr&product_id=" . $product_id;
                $hinh = "../upload/" . $img;
                if (is_file($hinh)) {
                  $anh = "<img src='" . $hinh . " 'width='350px' height='100px'>";
                } else {
                  $anh = "không có hình";
                }

                echo ' <tr >
                         
                          <td>' . $product_id . '</td>
                          <td>' . $product_name . '</td>
                          <td>' . $price . '</td>
                          <td>' . $anh . '</td>
                          <td>' . $mo_ta . '</td>
                          
                          
                          <td class="btn1"><a href="' . $update_pr . '"><input class="btn btn-gradient-primary btn2" type="button" value="Sửa"></a><a href="' . $delete_pr . '" onclick="return confirm(`Bạn muốn xóa?`)"; id="delete"><input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a></td>
                        </tr>';
              }
              ?>

            </tbody>
          </table>

        </div>
        <div class="list_page">
          <ul>
            <?php
            if (isset($_GET['page'])) {

              $page1 = $_GET['page'];
            } else {
              $page1 = 1;
            }

            for ($i = 1; $i <= $page; $i++) {
            ?>
              <li <?php if ($i == $page1) {
                    echo 'style="background: -webkit-linear-gradient(270deg, #00b3ff 0%, #006cff 100%);;"';
                  } else {
                    echo '';
                  }
                  ?>><a href="index.php?act=list_product&page=<?= $i ?>"><?= $i ?></a></li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>