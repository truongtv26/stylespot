<!--Important link from https://bootsnipp.com/snippets/XqvZr-->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<div class="pd-wrap">
    <link rel="stylesheet" href="./view/assets/css/detail_product.css">
    <script src="https://kit.fontawesome.com/cd29af7a45.js" crossorigin="anonymous"></script>
    <style>
        .detail-comment {
            background: rgb(216, 214, 214);
            padding: .5rem;
            padding-left: .7rem;
            border-radius: .5rem;
            position: relative;
        }

        .detail-comment::before {
            position: absolute;
            top: 20px;
            right: auto;
            bottom: auto;
            left: -12px;
            content: "";
            width: 0;
            height: 0;
            border-left: 8px solid transparent;
            border-right: 8px solid transparent;
            border-bottom: 8px solid rgb(216, 214, 214);
            -webkit-transform: translatey(-50%) rotate(-90deg);
            transform: translatey(-50%) rotate(-90deg);

        }

        a:hover {
            text-decoration: none;
        }
    </style>
    <div class="container">
        <div class="heading-section mt-2">
            <h2>Product Details</h2>
        </div>
        <div class="row">
            <?php
            extract($oneproduct);
            ?>
            <div class="col-md-6">
                <div id="slider" class="owl-carousel product-slider">

                    <div class="item">
                        <?php
                        $anh = "upload/" . $img;
                        echo '
             <img class="img-fluid" src="' . $anh . '" alt="">
            ';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-dtl">
                    <div class="product-info">
                        <div class="product-name"><?= $product_name ?></div>
                        <div class="reviews-counter">
                            <div class="rate">
                                <input type="radio" id="star5" name="rate" value="5" checked/>
                                <label for="star5" title="text">5 stars</label>
                                <input type="radio" id="star4" name="rate" value="4" checked/>
                                <label for="star4" title="text">4 stars</label>
                                <input type="radio" id="star3" name="rate" value="3" checked/>
                                <label for="star3" title="text">3 stars</label>
                                <input type="radio" id="star2" name="rate" value="2"/>
                                <label for="star2" title="text">2 stars</label>
                                <input type="radio" id="star1" name="rate" value="1"/>
                                <label for="star1" title="text">1 star</label>
                            </div>
                            <span>3 Reviews</span>
                        </div>
                        <?php
                        echo '
            <div class="product-price-discount"><span>$ ' . $price . '</span></div>   
          </div>
          <p>' . $mo_ta . '</p>
          ';
                        ?>
                        <form action="index.php?act=checkout" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="size">Size</label>
                                    <select name="size_id" class="form-control" required>
                                        <option value="">Chọn size</option>
                                        <?php
                                        foreach ($list_size as $list_size) {
                                            extract($list_size);
                                            echo '<option value=" ' . $pr_size . '">' . $pr_size . '</option>';
                                        }

                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="product-count">
                                <label for="size">Quantity</label>
                                <input style="border-color: #dee2e6;width: 100px;border-radius: 5px;" value="0"
                                       id="product_amount" name="product_amount" type="number" min="1" max="10">

                                <br>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <input type="hidden" name="product_name" value="<?= $product_name ?>">
                                    <input type="hidden" name="product_price" value="<?= $price ?>">
                                    <input type="hidden" name="product_img" value="<?= $anh ?>">
                                    <input type="hidden" name="product_id" value="<?= $product_id ?>">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        ?>
                                        <input type="submit" class="primary-btn btn mt-2" value="Thêm vào giỏ hàng"
                                               name="fake_bill">
                                        <?php
                                    } else {
                                        ?>
                                        <input type="submit" class="primary-btn btn mt-2" value="Thêm vào giỏ hàng"
                                               name="fake_bill">
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <?php
            $product_id = $_GET['product_id'];
            $dsbl = load_all_cmt($product_id);
            $count_cmt = count($dsbl);
            // echo "<pre>";
            // print_r($dsbl);
            ?>
            <div class="product-info-tabs">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="description-tab" data-toggle="tab" href="#description" role="tab"
                           aria-controls="description" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                           aria-controls="review" aria-selected="false">Reviews (<?= $count_cmt ?>)</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="description" role="tabpanel"
                         aria-labelledby="description-tab">
                        Giày thể thao nữ vải nữ viền độn đế mũi viền kẻ caro siêu hot <br><br>

                        - Kiểu dáng thanh lịch, màu sắc hài hòa trang nhã<br>
                        - Đế bằng cao su tổng hợp chắc chắn, bền <br><br>

                        - Giày có hộp của shop mới 100%, nhưng trong quá trình vận chuyển rất có thể hộp sẽ bị móp méo,
                        điều này shop không hề mong muốn và cũng không thể can thiệp được vào công việc vận chuyển, nên
                        mong anh/chị thông cảm. <br>
                        LƯU Ý: <br>
                        - Tất cả giầy shop bán xuất trực tiếp từ kho nên không chăm chút được cẩn thận. Cũng hy hữu có
                        thể xảy ra khi giày bị méo form, nhưng khi nhận giầy anh/chị đi lên chân 5' là giầy vào lại form
                        ạ. <br><br>

                        - Nến anh/chị nhận được sản phẩm lỗi hoặc do nhầm lẫn. Mong các bạn nhắn tin cho shop khắc phục
                        trước khi đánh giá sản phẩm ạ ❤<br> Shop cam kết sẽ luôn có trách nhiệm với sản phẩm đã bán❤
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <!--reviews-->
                        <script>
                            // lấy id sản phẩm
                            const product_id = <?=$_GET['product_id']?>

                            function loadComments() {
                                // nạp trang comment khi nguòi dùng click
                                let btnShowComment = document.querySelector("#review");

                                fetch("view/reviews.php?product_id=" + product_id)

                                    .then(res => res.text())
                                    .then(data => {
                                        btnShowComment.innerHTML = data;

                                        document.querySelectorAll(".rep-btn").forEach(btn => {
                                            btn.onclick = event => {
                                                event.preventDefault();
                                                let form = btn.parentElement.querySelector("form");
                                                if (form.parentElement.style.display == 'none') {
                                                    form.parentElement.style.display = 'block';
                                                    form.parentElement.focus();
                                                } else {
                                                    form.parentElement.style.display = 'none';
                                                }
                                            }
                                        });
                                    })

                                    // load lại comment khi người dùng bình luận
                                    .then(() => {
                                        document.querySelectorAll(".form-comment").forEach(form => {
                                            form.onsubmit = event => {
                                                event.preventDefault();
                                                fetch("view/reviews.php?product_id=" + product_id, {
                                                    method: 'POST',
                                                    body: new FormData(form)
                                                })
                                                    .then(res => res.text())
                                                    .then(data => {
                                                        form.parentElement.innerHTML = data;
                                                        loadComments();
                                                    })
                                            }
                                        })
                                    })
                            }

                            loadComments();
                        </script>
                    </div>
                </div>
                <!-- single product slide -->
                <div class="single-product-slider">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 text-center mt-5">
                                <div class="section-title mt-5">
                                    <h1>Sản phẩm cùng loại</h1>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <!-- single product -->
                            <?php
                            foreach ($product_cung_loai as $product_cung_loai) {
                                extract($product_cung_loai);
                                $linksp = "index.php?act=detail&product_id=" . $product_id;
                                $anh = "upload/" . $img;
                                echo '
          <div class="col-lg-3 col-md-6">
          <a  href="' . $linksp . '">
          <div class="single-product">
          <img class="img-fluid" src="' . $anh . '" alt="">
          <div class="product-details">
            <h6 style="color:black">' . $product_name . '</h6>
            <div class="price">
              <h6 style="color:black" >$ ' . $price . '</h6>
              <h6 class="l-through">$ ' . $price + 50 . '.00</h6>
            </div>
          </div>
        </div>
          </a>
          </div>
          ';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous">
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous">
        </script>