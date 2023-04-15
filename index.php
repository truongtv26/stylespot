<?php
if (!isset($_SESSION)) {
    session_start();
}
ob_start();
//Include required PHPMailer files
require './mail/PHPMailer/includes/PHPMailer.php';
require './mail/PHPMailer/includes/SMTP.php';
require './mail/PHPMailer/includes/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include 'model/PDO.php';
include './model/user.php';
include './model/comment.php';
include './model/product.php';
include './model/bill.php';

include './view/header.php';

// unset($_SESSION['mycart']);

if (!isset($_SESSION['mycart'])) $_SESSION['mycart'] = [];
$product_new = loadall_product_home();
$product_new2 = loadall_product_home2();

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'contact':
            include './view/contact.php';
            break;
        case 'login':
            if (isset($_POST['login']) && ($_POST['login'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $checkuser = checkuser($username, $password);
                if (is_array($checkuser)) {
                    $_SESSION['username'] = $checkuser;
                    if ($_SESSION['username']['status'] == 'false') {
                        $thongbao = "Tài khoản đã bị khóa.";
                        unset($_SESSION['username']);
                    } else {
                        if ($_SESSION['username']['role'] == 0) {
                            header('Location:index.php');
                        } else {
                            header('Location:./admin/index.php');
                        }
                    }
                } else {
                    $thongbao = "tài khoản không tồn tại.";
                }
            }
            include './view/account/login.php';
            break;
        case 'logout':
            session_unset();
            header('Location: index.php');
            break;
        case 'edit_user':
            if (isset($_POST['update']) && ($_POST['update'])) {
                $user_id = $_POST['user_id'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $address = $_POST['address'];
                $avatar = $_FILES['avatar']['name'];
                $target_dir = "/upload/";
                if (!empty($_FILES['avatar']['name'])) {
                    $user_img_old = getUser('avatar', $user_id);
                    if (file_exists($user_img_old))
                        unlink($user_img_old);

                    $target_file = $target_dir . basename($_FILES['avatar']['name']);
                    move_uploaded_file($_FILES['avatar']['tmp_name'], substr($target_file, 1));
                } else {
                    $target_file = '';
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                update_user($user_id, $username, $password, $target_file, $address, $phone, $email);
                $_SESSION['username'] = checkuser($username, $password);
                header('Location: index.php');
                $thongbao = "Cập Nhật Thành Công";
            }
            include "./view/account/edit_user.php";
            break;

        case 'registration':
            $list_user = load_all_account();
            if (isset($_POST['registration']) && ($_POST['registration'])) {
                $username = $_POST['username'];
                $password = $_POST['password'];
                $password2 = $_POST['password2'];
                $address = $_POST['address'];
                $avatar = $_FILES['avatar']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . $_FILES['avatar']['name'];

                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], substr($target_file, 1))) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                insert_client_user($username, $password, $target_file, $address, $phone, $email);
                $thongbao = "Đăng ký thành công";
                header('Location:index.php?act=login');
            }

            include './view/account/registration.php';
            break;
        case 'forgot_password':
            if (isset($_POST['forgot_password']) && ($_POST['forgot_password'])) {
                $username = $_POST['username'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $check_password = check_password($username, $email, $phone);
                $password = $check_password['password'];
                if (is_array($check_password)) {
                    //Create instance of PHPMailer
                    $mail = new PHPMailer();
                    //Set mailer to use smtp
                    $mail->isSMTP();
                    //Define smtp host
                    $mail->Host = "smtp.gmail.com";
                    //Enable smtp authentication
                    $mail->SMTPAuth = true;
                    //Set smtp encryption type (ssl/tls)
                    $mail->SMTPSecure = "tls";
                    //Port to connect smtp
                    $mail->Port = "587";
                    //Set gmail username
                    $mail->Username = "stylespot26@gmail.com";
                    //Set gmail password
                    $mail->Password = "pedjufgqzpmsucrg";
                    //Email subject
                    $mail->Subject = "Forgot Password";
                    //Set sender email
                    $mail->setFrom('stylespot26@gmail.com');
                    //Enable HTML 
                    $mail->isHTML(true);
                    //Attachment
                    // $mail->addAttachment('img/attachment.png');
                    //Email body
                    $mail->Body = "<h1>Xin chào, $username</h1></br><p>Mật khẩu của bạn là: $password</p>";
                    //Add recipient
                    $mail->addAddress($email);
                    //Finally send email
                    if ($mail->send()) {
                        echo '
                        <script>
                        alert("Mật khẩu của bạn đã được gửi tới email");
                        window.location.href="index.php?act=login";
                        </script>';
                    } else {
                        echo '
                        <script>
                             alert("Message could not be sent. Mailer Error: " . $mail->ErrorInfo);
                        </script>
                        ';
                    }
                    //Closing smtp connection
                    $mail->smtpClose();
                } else {
                    $thongbao = "Thông tin tài khoản không đúng";
                }
            }
            $list_user = load_all_account();
            include "./view/account/forgot_password.php";
            break;

        case 'cart':
            if (isset($_GET['product_id'])) {
                $product_id = $_GET['product_id'];
                $oneproduct = loadone_product($product_id);
                extract($oneproduct);
                $list_size = load_product_size($product_id);
                extract($list_size);
                $product_name = $oneproduct['product_name'];
                $price = $oneproduct['price'];
                $img = $oneproduct['img'];
                $soluong = $_POST['product_amount'];
                $item = [$product_id, $product_name, $price, $img, $soluong, $list_size];
                array_push($_SESSION['mycart'], $item);
                header('Location:index.php');
            }
            include './view/cart.php';
            break;
        case 'delete_cart':
            # code...
            if (isset($_GET['cart_id'])) {
                array_splice($_SESSION['mycart'], $_GET['cart_id'], 1);
            } else {
                // $_SESSION['mycart'] = [];
            }
            header("Location:index.php?act=cart");
            break;
        case 'delete_checkout':
            # code...
            if (isset($_GET['cart_id'])) {
                array_splice($_SESSION['fake_cart'], $_GET['cart_id'], 1);
            }
            header("Location:index.php?act=checkout");
            break;
        case 'checkout':

            // unset($_SESSION['mycart']);
            $error = [];
            if (!isset($_SESSION['fake_cart']))
                $_SESSION['fake_cart'] = [];

            if (isset($_POST['fake_bill'])) {
                $product_id = $_POST['product_id'];
                $pr_name = $_POST['product_name'];
                $pr_price = $_POST['product_price'];
                $pr_img = $_POST['product_img'];
                $pr_size = $_POST['size_id'];
                if (isset($_POST['total_price'])) {
                    $total_cart = $_POST['total_price'];
                } else {
                    $total_cart = 0;
                }
                $product_amount = $_POST['product_amount'];
                $bill = [$product_id, $pr_name, $pr_price, $pr_img, $product_amount, $pr_size, $total_cart];
                array_push($_SESSION['fake_cart'], $bill);
            }

            include './view/checkout.php';
            break;
        case 'delete_all_checkout':
            unset($_SESSION['fake_cart']);
            include './view/home.php';
            break;
        case 'confirmation':

            if (isset($_POST['redirect'])) {
                $bill = [];
                $_SESSION['payment_info']['user_id'] = $_SESSION['username']['user_id'] ?? -1;
                $_SESSION['payment_info']['username'] = $_POST['username'] ?? '';
                $_SESSION['payment_info']['email'] = $_POST['email'] ?? '';
                $_SESSION['payment_info']['phone'] = $_POST['phone'] ?? '0123456789';
                $_SESSION['payment_info']['address'] = $_POST['address'] ?? '';

                extract($_SESSION['payment_info']);

                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date = date('d/m/Y');
                $total_price = total_cart();
                $pttt = 0;
                if (isset($_POST['pttt']))
                    $pttt = $_POST['pttt'];
                $id_bill = insert_bill($username, $email, $address, $phone, $total_price, $pttt, 0, $user_id, $date);
                $bill = load_one_bill($id_bill);
                $_SESSION['bill_id'] = $id_bill;
                // kiểm tra phương thức thanh toán
                if (isset($_POST['pttt']) && $_POST['pttt'] == 0) {
                    foreach ($_SESSION['fake_cart'] as $cart) {
                        insert_cart($_SESSION['payment_info']['user_id'], $cart[2], $cart[4], $cart[0], $cart[5], $id_bill, $cart[1]);
                    }
                    // unset($_SESSION['mycart']);

                } else if (isset($_POST['pttt']) && $_POST['pttt'] == 1) {
                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost/stylespot/index.php?act=confirmation";
                    $vnp_TmnCode = "AHHTKREQ";//Mã website tại VNPAY
                    $vnp_HashSecret = "VMSIIZCASYXHGGVYFFOLAQUNCSNIDIEG"; //Chuỗi bí mật

                    $vnp_TxnRef = $id_bill; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = 'Thanh toán thành công';
                    $vnp_OrderType = 'billpayment';
                    $vnp_Amount = $total_price * 2346300;
                    $vnp_Locale = 'vn';
                    $vnp_BankCode = 'NCB';
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
//                $vnp_ExpireDate = $expire;

                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef
                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    // if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                    //     $inputData['vnp_Bill_State'] = $vnp_Bill_State;
                    // }

                    //var_dump($inputData);
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret); //
                        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if (isset($_POST['redirect'])) {

                        foreach ($_SESSION['fake_cart'] as $cart) {
                            insert_cart($_SESSION['username']['user_id'], $cart[2], $cart[4], $cart[0], $cart[5], $id_bill, $cart[1]);
                        }
                        $_SESSION['cart'] = [];
                        header('Location: ' . $vnp_Url);
                    } else {
                        echo json_encode($returnData);
                    }

                }
            }
            $bill = load_one_bill($_SESSION['bill_id']);
            $bill_ct = list_cart($_SESSION['bill_id']);
            include './view/confirmation.php';
            break;
        case 'mycart':
            // nếu người dùng đăng nhập => hiện lịch sử đơn hàng theo id người dùng
            if (!isset($_SESSION['username'])){
                $keyword = "";
                if (isset($_GET['keyword'])) {
                    $keyword = $_GET['keyword'];
                }
                $list_img_cart = list_img_cart_not_login(-1,$keyword);
            } else {
                $list_img_cart = list_img_cart($_SESSION['username']['user_id']);
            }

            $list_img_cart = array_reduce($list_img_cart, function ($result, $item){
                $result[$item['bill_id']][] = $item;
                return $result;
            }, array());

            include './view/mycart.php';
            break;
        case 'delete_bill':
            update_bill('-1', $_GET['bill_id']);
            header("Location:index.php?act=mycart");
            break;
        case 'detail':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                increateView($_GET['product_id']);
                $product_id = $_GET['product_id'];
                $oneproduct = loadone_product($product_id);
                extract($oneproduct);
                $product_cung_loai = load_product_cungloai($product_id, $categori_id);
                $list_size = load_product_size($product_id);
                if (isset($_SESSION['username'])) {
                    $list_img_cart = list_img_cart($_SESSION['username']['user_id']);
                }
                include './view/detail.php';
            } else {
                include './view/home.php';
            }

            break;

        // chi tiết sản phẩm

        case 'insert_commnet':
        {
            if (isset($_POST['btn_submit_comment'])) {
                extract($_POST);
                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $date_comment = date('h:i:s a - d/m/Y');
                insert_comment($content_comment, $product_id, $user_id, $date_comment);

                header('location: index.php?act=detail&product_id=' . $product_id);
            };
            break;
        }
        case 'man_pr':
            $count_product = count(count_product_man());
            $page = ceil($count_product / 12);
            $load_all_product_man = load_all_product_man(1);
            include './view/man_pr.php';
            break;
        case 'woman_pr':
            $count_product = count(count_product_women());
            $page = ceil($count_product / 12);
            $load_all_product_women = load_all_product_women(1);
            include './view/woman_pr.php';
            break;
        case 'search_pr':
            $text_search = $_POST['search_pr'];
            $list_pr_search = search_pr($text_search);
            include './view/search_pr.php';
            break;
        default:
            include './view/home.php';
            break;
    }
} else {
    include './view/home.php';
}

if (isset($_GET['act']) && $_GET['act'] == 'registration') {
    include './view/footer1.php';
} else {
    include './view/footer.php';
}
