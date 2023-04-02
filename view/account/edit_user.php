<!-- End Header Area -->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Cập Nhật Tài Khoản</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=edit_user">Cập Nhật Tài Khoản</a>
        </nav>
      </div>
    </div>
  </div>
</section>
<!-- End Banner Area -->

<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
  <div class="container">
    <div class="row justify-content-around">
      <div class="col-lg-6">
        <div class="login_form_inner">
          <?php
          if (isset($_SESSION['username']) && (is_array($_SESSION['username']))) {
            extract($_SESSION['username']);
          }


          ?>
          <h3>Cập Nhật Tài Khoản</h3>

          <h2 class="thongbao">
            <?php

            if (isset($thongbao) && ($thongbao != "")) {
              echo $thongbao;
            }
            ?>
          </h2>

          <form class="row login_form pb-3" action="index.php?act=edit_user" method="post" enctype="multipart/form-data" id="registrationForm" novalidate="novalidate">
            <div class="col-md-12 form-group">

              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="last_name" name="username" value="<?= $username ?>" placeholder="Tài khoản">
              </div>

              <div class="col-md-12 form-group">
                <input type="password" class="form-control" id="DOB" name="password" value="<?= $password ?>" placeholder="Mật Khẩu">
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="email" name="email" value="<?= $email ?>" placeholder="Email">
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="email" name="phone" value="<?= $phone ?>" placeholder="Phone">
              </div>
              <div class="col-md-12 form-group">
                <input type="text" class="form-control" id="email" name="address" value="<?= $address ?>" placeholder="Address">
              </div>
              <img src="" alt="">
              <div class="mb-3 form-group">
                <label for=""><img width="180px" src="<?= $avatar ?>" alt="Avatar"></label>
                <input class="form-control" type="file" id="formFile" name="avatar" placeholder="Avatar">
              </div>

              <div class="col-md-12 form-group">
                <input type="hidden" name="user_id" value="<?= $user_id ?>"></input>
                <button type="submit" value="submit" name="update" class="primary-btn">Cập nhật </button>

              </div>
          </form>
        </div>
      </div>
    </div>


    <!--================End Login Box Area =================-->


  </div>
</section>

</body>