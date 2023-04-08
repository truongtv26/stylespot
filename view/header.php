<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="google-translate-customization" content="9f841e7780177523-3214ceb76f765f38-gc38c6fe6f9d06436-c">
    </meta>
    <!-- Favicon-->
    <link rel="shortcut icon" href="./view/assets/img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>StyleSpot - Shop bán giày</title>
    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="./view/assets/css/linearicons.css">
    <link rel="stylesheet" href="./view/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="./view/assets/css/themify-icons.css">
    <link rel="stylesheet" href="./view/assets/css/bootstrap.css">
    <link rel="stylesheet" href="./view/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="./view/assets/css/nice-select.css">
    <link rel="stylesheet" href="./view/assets/css/nouislider.min.css">
    <link rel="stylesheet" href="./view/assets/css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="./view/assets/css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="./view/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="./view/assets/css/main.css">
    <link rel="stylesheet" href="./view/assets/css/jquerysctipttop.css">
    <link rel="stylesheet" href="./view/assets/css/availability-calendar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script defer src="./view/assets/js/main.js"></script>
</head>
<style>
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }

    body {
        top: 0px !important;
    }

    body {
        position: relative;
    }

    #google_translate_element {
        position: absolute;
        top: 0;
        right: -25px;
        z-index: 99;
    }

    #google_translate_element select {
        border: 2px solid #ffba01;
    }

    #google_translate_element select:focus {
        outline: none;
    }

    #layer_translate {
        /*position: fixed;*/
        top: 25px;
        right: 0px;
        z-index: 100;
        background-color: transparent;
        width: 163px;
        height: 25px;
    }
</style>

<body>
    <div id="google_translate_element"></div>
    <div id="layer_translate"></div>
    <!-- Start Header Area -->
        <header class="header_area sticky-header ">
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light main_box">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <a class="navbar-brand logo_h" href="index.php"><img src="./view/assets/img/logo12.png" alt="" width="270px"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                            <li class="nav-item submenu dropdown">
                                <a href="index.php?act=man_pr" class="nav-link " role="button" aria-haspopup="true" aria-expanded="false">Nam</a>
                            </li>
                            <li class="nav-item submenu dropdown">
                                <a href="index.php?act=woman_pr" class="nav-link " role="button" aria-haspopup="true" aria-expanded="false">Nữ</a>
                            </li>

                            <li class="nav-item"><a class="nav-link" href="index.php?act=contact">Liên hệ</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a class="nav-link" href="index.php?act=cart" id="cart"><i class="lnr lnr-heart"></i><span class="badge">

                                        <?php
                                        $count = 0;
                                        if (isset($_SESSION['mycart'])) {
                                            $count = count($_SESSION['mycart']);
                                            echo "<p>$count</p>";
                                        } else {
                                            echo '<p>0</p>';
                                        }

                                        ?>

                                    </span></a></li>
                            <li><a class="nav-link" href="index.php?act=checkout" id="cart"><i class="ti-bag"></i><span class="badge"></span>
                            <li class="nav-item submenu dropdown ">
                                <a href="" style="color:#006cff" class="cart" class="nav-item" class="nav-link dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="false" aria-expanded="true"><span class="ti-user"></span>
                                    <?php if (isset($_SESSION['username'])) {
                                    ?>
                                        <span> Chào   </span><?php echo $_SESSION['username']['username'] ?>
                                    <?php
                                    } else {
                                    }
                                    ?></a>
                                <ul class="dropdown-menu">
                                    <?php
                                    if (isset($_SESSION['username'])) {
                                        extract($_SESSION['username']);
                                    ?>
                                        <?php
                                        if ($role == '1') {
                                        ?>
                                            <li>
                                            <li class="nav-item"><a class="nav-link" href="admin/index.php"> Đăng nhập
                                                    admin</a></li>
                            </li>

                        <?php } ?>
                        <li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=mycart"> Danh sách đơn hàng</a></li>
                        </li>
                        <li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=edit_user"> Cập Nhật Tài Khoản</a></li>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="index.php?act=forgot_password"> Quên Mật
                                Khẩu</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=logout"> Đăng Xuất </a> </li>
                    <?php
                                    } else {
                    ?>
                        <li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=login">Đăng Nhập</a> </li>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="index.php?act=registration">Đăng Kí</a> </li>
                        <li class="nav-item"><a class="nav-link" href="index.php?act=mycart">Tra cứu đơn hàng</a> </li>

                    <?php
                                    }
                    ?>

                        </ul>

                        </li>

                        <li class="nav-item">
                            <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                        </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container">
                <form class="d-flex justify-content-between" method="POST" action="index.php?act=search_pr">
                    <input type="text" class="form-control" id="search_input" name="search_pr" placeholder="Tìm kiếm">
                    <button type="submit" class="btn"></button>
                    <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>

    </header>