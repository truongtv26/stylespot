<style>
  .role {
    margin-left: 1rem;
  }
</style>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cập nhật tài khoản</h4>
        <?php
        if (!empty($account)) {
          extract($account);
        }
        ?>
        <form action="index.php?act=update_account" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Username</label>
            <input type="text" class="form-control" name="username" value="<?= $username ?>">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $email ?>">
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" value="<?= $password ?>">
          </div>
          <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" value="<?= $address ?>">
          </div>
          <div class="form-group">
            <label for="">Phone</label>
            <input type="phone" class="form-control" name="phone" value="<?= $phone ?>">
          </div>
          <div class="form-group">
            <label for="">Avatar</label>
            <img style="width: 120px;" src="<?= $avatar ?>" class="form-control" alt="ảnh">
            <input class="form-control mt-2" type="file" name="file" id="" multiple="multiple">
          </div>
          <div class="form-group">
            <label for="">Vài trò</label> <br>
            <input type="radio" class="form-check-input" name="role" value="0" <?php echo $role == 0 ?  'checked' : false ?>> Khách hàng
            <input type="radio" class="form-check-input role" name="role" value="1" <?php echo $role == 1 ?  'checked' : false ?>> Admin
          </div>
          <input type="hidden" name="user_id" value="<?= $user_id ?>">
          <button type="submit" class="mt-3 btn btn-primary" name="update_account_one">Cập nhật</button>
          <input type="reset" class="mt-3 btn btn-primary" value="Nhập lại">
        </form>
      </div>
    </div>
  </div>