<style>
	.details_item ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.list li {
		margin-bottom: 18px;
	}

	.list li a {
		text-decoration: none;
		color: black;
		font-size: 1rem;
	}

	.list li a span {
		font-weight: bold;
	}

	.title_confirmation {
		color: green;
	}

	.order_d_inner {
		border-radius: .5rem;
		background: #e5ecee;
		padding: 0.5rem;
		padding-top: 1rem;
	}

	.your_order {
		margin-top: 1rem;
		border-radius: .5rem;
		background: #e5ecee;
		padding: 1rem;
	}
</style>

<div class="card">
	<div class="card-body">
		<div class="thaotac">
			<a href="index.php?act=list_bill"><input class="btn btn-primary" type="button" value="Danh sách đơn hàng"></a>
		</div>
		<h4 class="title_confirmation text-center m-4">Thank you. Your order has been received.</h4>
		<hr>
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
					<h4>Order Info</h4>
					<ul class="list">
						<li><a href="#"><span>Code </span>: BILL-<?= $bill_id ?> </a></li>
						<li><a href="#"><span>Date</span> : <?= $date ?></a></li>
						<li><a href="#"><span>Total</span> : <?= $total_money ?> $</a></li>
						<li><a href="#"><span>Payment method</span> : <?= $pttt ?></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="details_item">
					<?php
					extract($_SESSION['username']);
					?>
					<h4>Shipping Detail</h4>
					<ul class="list">

						<hr>
						<li><a href="#"><span>Username</span> : <?= $_SESSION['user_bill'][0] ?></a></li>
						<li><a href="#"><span>Phone</span> : <?= $_SESSION['user_bill'][2] ?> </a></li>
						<li><a href="#"><span>Address</span> : <?= $_SESSION['user_bill'][1] ?> </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="order_details_table">
			<h2>Order Details</h2>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Product</th>
							<th scope="col">Quantity</th>
							<th scope="col">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($_SESSION['admin_cart'] as $value) {
							extract($value);
							// echo '<pre>';
							// print_r($value);
						?>

							<tr>
								<td>
									<p><?php echo $value[1]  ?></p>
								</td>
								<td>
									<h5><?php echo $value[4] ?></h5>
								</td>
								<td>
									<p>$ <?php echo $value[3] * $value[4] ?></p>
								</td>
							</tr>
						<?php
						}
						?>

						<tr>
							<td>
								<h4>Subtotal</h4>
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
								<h4>Shipping</h4>
							</td>
							<td>
								<h5></h5>
							</td>
							<td>
								<p>Flat rate: $50.00</p>
							</td>
						</tr>
						<tr>
							<td>
								<h4>Total</h4>
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
</div>