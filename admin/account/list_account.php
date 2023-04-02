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

  .active1 {
    position: relative;
    width: 20px;
  }

  .active1 a,
  .active1 input {
    margin: 0;
    padding: 0;
    width: 30px;
    margin-left: -1px;
  }

  .active1_btn {
    position: absolute;
    top: 0;
    width: 25px;
  }
</style>
<?php

if (isset($_GET['status']) && isset($_GET['user_id'])) {
  $btn = $_GET['status'];
  $admin_id = $_GET['user_id'];
  if ($btn == 'true') {
    $btn = 'false';
  } else if ($btn == 'false') {
    $btn = 'true';
  }
  update_status($btn, $admin_id);
  if ($btn == 'false') {
    echo '<p id="mess">Đã khóa tài khoản</p>';
  } else {
    echo '<p id="mess">Đã mở khóa tài khoản</p>';
  }
  header("Location:index.php?act=list_account");
}

?>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Danh sách khách hàng</h4>
        <div class="table-responsive">
          <table class="table table-bordered text-center table1">
            <thead>
              <tr>
                <th>Mã KH</th>
                <th>Tên đăng nhập</th>
                <th>Mật khẩu</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Phone</th>
                <th>Avatar</th>
                <th>Vai trò</th>
                <th>Status</th>
                <th style="width: 17%;">Thao tác</th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach ($list_account as $value) {
                extract($value);
                // echo '<pre>';
                // print_r($value);
                // echo '<pre/>';
                $update_account = "index.php?act=update_account&user_id=" . $user_id;
                $delete_account = "index.php?act=delete_account&user_id=" . $user_id;
                $update_status = "index.php?act=list_account&user_id=" . $user_id . "&status=" . $status;
                if ($role == 0) {
                  $role = "Khách hàng";
                } else {
                  $role = "Admin";
                }
              ?>

                <tr>

                  <td><?php echo $user_id ?></td>
                  <td><?php echo $username ?></td>
                  <td><?php echo $password ?></td>
                  <td><?php echo $email ?></td>
                  <td><?php echo $address ?></td>
                  <td><?php echo $phone ?></td>
                  <?php
                  if (!empty($avatar)) {
                  ?>
                    <td><img src="<?= $avatar ?>" alt="Avatar"></td>
                  <?php
                  } else {
                  ?>
                    <td></td>
                  <?php
                  }
                  ?>
                  <td><?php echo $role ?></td>
                  <td style="display: flex;justify-content: center;" class="mt-3">
                    <form action="" method="post">
                      <div class="status d-flex justify-content-center active1 ">
                        <div class="form-switch ">
                          <?php
                          if (isset($status) && $status == 'true') {
                            $i = 'checked';
                          } else {
                            $i = '';
                          }
                          ?>
                          <input class="form-check-input" onclick="getbtn()" <?php if (isset($i)) echo $i ?> name="btn_active" value="<?= $btn ?>" type="checkbox" role="switch" id="flexSwitchCheckChecked">
                        </div>
                        <div class="active1_btn">
                          <a class="" href="<?php echo $update_status ?>"><input style="color: transparent;" class="btn" name="active" id="" value="hello"></a>
                        </div>
                      </div>
                    </form>
                  </td>
                  <td class="btn1"><a href="<?php echo $update_account ?>"><input class="btn btn-gradient-primary btn2" type="button" value="Sửa"></a><a href="<?php echo $delete_account ?>" onclick="return confirm(`Bạn muốn xóa?`)" ; id="delete"><input class="btn btn-gradient-danger btn2" type="button" value="Xóa"></a></td>
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
<script>
  function getbtn() {
    let btn = document.getElementsByName("btn_active");
    for (let i = 0; i < btn.length; i++) {
      if (btn[i].checked) {
        btn[i].value = true;
      } else {
        btn[i].value = false;
      }
    }
  }
</script>