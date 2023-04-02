	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<br>
					<h1>Confirmation</h1>
					<nav class="d-flex align-items-center">
						<a href="index.php">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="index.php?act=confirmation">Confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Order Details Area =================-->
	<section class="order_details section_gap">
		<div class="container">
			<h3 class="title_confirmation">Đơn hàng của bạn đã được xác nhận</h3>
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<?php
						extract($bill);
						if ($pttt == 0) {
							$pttt = 'Thanh toán khi nhận hàng';
						} else {
							$pttt = 'Thanh toán bằng VNPAY';
						}
						?>
						<h4>Thông tin đơn hàng</h4>
						<ul class="list">
							<li><a href="#"><span>Mã đơn </span>: BILL-<?= $bill_id ?> </a></li>
							<li><a href="#"><span>Ngày đặt hàng</span> : <?= $date ?></a></li>
							<li><a href="#"><span>Tổng tiền</span> : <?= $total_money ?> $</a></li>
							<li><a href="#"><span>Thanh toán</span> : <?= $pttt ?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<?php
						extract($_SESSION['username'] ?? $_SESSION['payment_info']);
						?>
						<h4>Thông tin khách hàng</h4>
						<ul class="list">
							<li><a href="#"><span>Khách hàng</span> : <?= $username ?></a></li>
							<li><a href="#"><span>Số điện thoại</span> : <?= $phone ?></a></li>
							<li><a href="#"><span>Địa chỉ nhận hàng</span> : <?= $address ?></a></li>
							<li><a href="#"><span>Email </span> : <?= $email ?></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="order_details_table">
				<h2>Chi tiết đơn hàng</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">Sản phẩm</th>
								<th scope="col">Số lượng</th>
								<th scope="col">Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($_SESSION['fake_cart'] as $value) {
								extract($value);

							?>

								<tr>
									<td>
										<p><?php echo $value[1]  ?></p>
									</td>
									<td>
										<h5><?php echo $value[4] ?></h5>
									</td>
									<td>
										<p>$ <?php echo $value[2] * $value[4] ?></p>
									</td>
								</tr>
							<?php
							}
							?>

							<tr>
								<td>
									<h4>Tổng tiền</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p> $ <?= $total_money - 50 ?> </p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Phí vận chuyển</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p>$50.00</p>
								</td>
							</tr>
							<tr>
								<td>
									<h4>Thành tiền</h4>
								</td>
								<td>
									<h5></h5>
								</td>
								<td>
									<p> $ <?= $total_money ?> </p>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
	<!--================End Order Details Area =================-->

	<!-- start footer Area -->

	<!-- End footer Area -->


	</body>

	</html>