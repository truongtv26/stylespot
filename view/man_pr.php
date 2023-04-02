<!-- End Header Area -->
<style>
    .product__man img.img-fluid {
        width: 271px;
        height: 255px;
    }
</style>
<!--back to top-->
<button id="myBtn" title="Lên đầu trang"><img src="./view/assets/img/back_to_top.png" title='lên đầu trang' width='30px' height="30px" /></button>
<!--end back to top-->

<!-- start banner Area -->
<section class="banner-area organic-breadcrumb">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <br>
                <h1>Danh mục giày nam</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.php">Trang chủ<span class="lnr lnr-arrow-right"></span></a>
                    <a href="index.php?act=man_pr">Giày Nam</a>
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
                    <h1 class="mt-5">Giày Nam</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- single product -->
            <?php

            foreach ($load_all_product_man as $value) { ?>

                <div class="col-lg-3 col-md-6">
                    <div class="product__man single-product">
                        <a href="index.php?act=detail&product_id=<?php echo $value['product_id'] ?>" class="social-info">
                            <img class="img-fluid" src="./upload/<?php echo $value['img'] ?>" alt="">
                        </a>
                        <div class="product-details">
                            <h6><?php echo $value['product_name'] ?></h6>
                            <div class="price">
                                <h6>$<?php echo $value['price'] ?></h6>
                                <h6 class="l-through">$<?php echo $value['price'] + 50 ?>.00</h6>
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
                            echo 'style="background: -webkit-linear-gradient(270deg, #00b3ff 0%, #006cff 100%);"';
                        } else {
                            echo '';
                        }
                        ?>><a href="index.php?act=man_pr&page=<?= $i ?>"><?= $i ?></a></li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<style>
    .list_page ul {
        display: flex;
        justify-content: center;
        gap: 10px;
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