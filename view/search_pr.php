<!-- End Header Area -->
<style>
    .product__man img.img-fluid {
        width: 271px;
        height: 255px;
    }
</style>
<!--back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/buttonTop.png" title='lên đầu trang' width='30px' height="30px" /></button>
<!--end back to top-->

<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Kết quả tìm kiếm <?php echo '"' . $text_search . '"' ?></h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <p>Search</p>
                    <!-- <a href="index.php?act=search_pr">Search</a> -->
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<!-- single product slide -->
<div class="single-product-slider">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title ">
                    <h1 class="mt-5">Kết quả tìm kiếm <?php echo '"' . $text_search . '"' ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single product -->
            <?php
            foreach ($list_pr_search as $value) {
            ?>

                <div class="col-lg-3 col-md-6">
                    <div class="product__man single-product">
                        <a href="index.php?act=detail&product_id=<?php echo $value['product_id'] ?>" class="social-info">
                            <img class="img-fluid" src="./upload/<?php echo $value['img'] ?>" alt="">
                        </a>
                        <div class="product-details">
                            <h6><?php echo $value['product_name'] ?></h6>
                            <div class="price">
                                <h6>$<?php echo $value['price'] ?></h6>
                                <!-- <h6 class="l-through">$210.00</h6> -->
                                <!-- discount -->
                            </div>
                            <div class="prd-bottom">
                                <a href="index.php?act=cart&product_id=<?php echo $value['product_id'] ?>" class="social-info">
                                    <span class="lnr lnr-heart"></span>
                                    <p class="hover-text">Thêm vào yêu thích</p>
                                </a>
                                <a href="index.php?act=detail&product_id=<?php echo $value['product_id'] ?>" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Xem thêm</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            <?php
            }
            ?>


        </div>
    </div>
</div>