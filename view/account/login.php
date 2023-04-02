<style>
	span {
		color: red;
	}
</style>
<!-- back to top button-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/buttonTop.png" title='lên đầu trang' width='30px' height="30px" /></button>
<!--End Back to top button-->

<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
	<div class="container">
		<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
			<div class="col-first">
				<br>
				<h1>Đăng nhập</h1>
				<nav class="d-flex align-items-center">
					<a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
					<a href="index.php?act=login">Đăng nhập</a>
				</nav>
			</div>
		</div>
	</div>
</section>
<!-- End Banner Area -->
<!--================Login Box Area =================-->
<section class="login_box_area section_gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="login_box_img">
					<img class="img-fluid" src="./view/assets/img/login.jpg" alt="">
					<div class="hover">
						<h4>Bạn là người mới?</h4>
						<p>Hãy tạo tài khoản để mua hàng ở trang web chúng tôi!</p>
						<a class="primary-btn" href="index.php?act=registration">Tạo tài khoản</a>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="login_form_inner">
					<h3>ĐĂNG NHẬP</h3>
					<form class="row login_form" onclick="return checkForm()" method="post" id="contactForm">
						<div class="col-md-12 form-group">
							<input type="text" class="form-control" id="name" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tên đăng nhập'">
							<span class="mt-3 float-left"></span>

						</div>
						<div class="col-md-12 form-group">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mật khẩu'">
							<span class="mt-3 float-left"><?= (isset($thongbao)) ? $thongbao : false ?></span>
							<span class="mt-3 float-left"></span>

						</div>
						<div class="col-md-12 form-group">
							<div class="creat_account">
								<input type="checkbox" id="f-option2" name="selector">
								<label for="f-option2">Duy trì đăng nhập</label>
							</div>
						</div>
						<div class="col-md-12 form-group">
							<button type="submit" value="submit" name="login" class="primary-btn">Đăng nhập</button>
							<a href="index.php?act=forgot_password">Quên mật khẩu?</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================End Login Box Area =================-->



</body>
<script>
	function checkForm() {
		var nodeSpan = document.getElementsByTagName("span");
		var nodeInput = document.getElementsByTagName("input");
		console.log(nodeInput);
		if (nodeInput[1].value == "") {
			nodeSpan[8].innerHTML = "Không được để trống";
		} else {
			nodeSpan[8].innerHTML = "";
		}
		if (nodeInput[2].value == "") {
			nodeSpan[9].innerHTML = "Không được để trống";
		} else {
			nodeSpan[9].innerHTML = "";
		}
		if (nodeInput[1].value != "" && nodeInput[2].value != "") {
			// thêm action sau khi validate form
			document.getElementById("contactForm").setAttribute("action", "index.php?act=login");
			return true;
		} else {
			document.getElementById("contactForm").setAttribute("action", "");
			return false;
		}

	}
</script>

</html>