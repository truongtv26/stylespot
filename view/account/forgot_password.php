<!-- End Header Area -->
<button id="myBtn" title="Lên đầu trang"><img src="assets/img/buttonTop.png" title='lên đầu trang' width='30px' height="30px" /></button>
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
  <div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
      <div class="col-first">
        <br>
        <h1>Quên Mật Khẩu</h1>
        <nav class="d-flex align-items-center">
          <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
          <a href="index.php?act=edit_user">Quên Mật Khẩu</a>
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
          <h3>Quên Mật Khẩu </h3>

          <h4 class="thongbao">
            <?php

            if (isset($thongbao) && ($thongbao != "")) {
              echo $thongbao;
            }

            ?>
          </h4>

          <form class="row login_form pb-3" action="index.php?act=forgot_password" method="post" id="registrationForm" >
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="last_name" name="username" placeholder="Username" required>
              <span class="mt-3 float-left"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="last_name" name="email" placeholder="Email" required>
              <span class="mt-3 float-left"></span>
            </div>
            <div class="col-md-12 form-group">
              <input type="text" class="form-control" id="last_name" name="phone" placeholder="Phone" required>
              <span class="mt-3 float-left"></span>
            </div>

            <div class="col-md-12 form-group">
              <button type="submit" value="submit" name="forgot_password" class="primary-btn">Gửi </button>

            </div>
          </form>
        </div>
      </div>
    </div>


    <!--================End Login Box Area =================-->


  </div>
</section>

</body>