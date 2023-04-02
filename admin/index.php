<?php
session_start();
ob_start();

if (!isset($_SESSION['username']))
    header("location:../index.php");

include '../model/PDO.php';
include '../model/comment.php';
include '../model/bill.php';
include '../model/categori.php';
include '../model/product.php';
include '../model/user.php';
include '../model/statistical.php';

include 'header.php';

//controller
// unset($_SESSION['admin_cart']);
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        // thêm danh mục
        case 'add_category':
        {
            if (isset($_POST['btn_add_categori'])) {
                $data[] = $_POST['categori_name'];
                categori_add($data);
                $thongbao = '<span id="mess">Đã thêm danh mục</span>';
            }
            include './category/add_category.php';
            break;
        }
        // danh sách danh mục
        case 'list_category':
            include "./category/list_categories.php";
            break;
        // xóa danh mục
        case 'delete_category':
            $categori_id = $_GET['categori_id'];
            categori_delete($categori_id);
            $thongbao = '<span id="mess">Đã xóa danh mục</span>';
            include './category/list_categories.php';
            break;
        case 'update_category':
            $categori_id = $_GET['categori_id'];
            $categori_one = categori_one($categori_id);
            include "./category/update_category.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat'])) {
                extract($_POST);
                $data = [
                    $categori_name,
                    $categori_id
                ];
                categori_update($data);
                $thongbao = '<span id="mess">Cập nhật thành công</span>';
            }
            include "./category/list_categories.php";
            break;
        // sản phẩm
        case 'add_product':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $mo_ta = $_POST['mo_ta'];
                $categori_id = $_POST['categori_id'];
                insert_product($product_name, $price, $img, $mo_ta, $categori_id);
                $thongbao = '<span id="mess">Đã thêm sản phẩm</span>';
            }
            $result = categori_all();
            include './product/add_product.php';
            break;
        case 'list_product':
            if (isset($_POST['search_dm']) && ($_POST['search_dm'])) {
                unset($_SESSION['kyw']);
                unset($_SESSION['categori']);
                $kyw = $_POST['kyw'];
                $categori_id = $_POST['categori_id'];
                $_SESSION['kyw'] = [];
                $_SESSION['categori'] = [];
                array_push($_SESSION['kyw'], $kyw);
                array_push($_SESSION['categori'], $categori_id);
            } else {
                $kyw = '';
                $categori_id = 0;
            }

            $list_categori = categori_all();
            $count_product = count(loadall_product(isset($_SESSION['kyw'][0]) ? $_SESSION['kyw'][0] : '', isset($_SESSION['categori'][0]) ? $_SESSION['categori'][0] : ''));
            // echo $count_product;
            $page = ceil($count_product / 7);
            $list_product = loadall_product_admin(isset($_SESSION['kyw'][0]) ? $_SESSION['kyw'][0] : '', isset($_SESSION['categori'][0]) ? $_SESSION['categori'][0] : '', $page);
            include "./product/list_product.php";
            break;
        case 'delete_pr':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                delete_product($_GET['product_id']);
            }
            $count_product = count(loadall_product($_SESSION['kyw'][0], $_SESSION['categori'][0]));
            // echo $count_product;
            $page = ceil($count_product / 7);
            $list_product = loadall_product_admin($_SESSION['kyw'][0], $_SESSION['categori'][0], $page);
            include "./product/list_product.php";
            break;
        case 'update_pr':
            if (isset($_GET['product_id']) && ($_GET['product_id'] > 0)) {
                $product_one = loadone_product($_GET['product_id']);
            }
            $result = categori_all();
            $load_product_size = load_product_size($_GET['product_id']);
            $list_size = loadall_size();
            include "./product/updatepr.php";
            break;
        case 'updatepr':
            if (isset($_POST['capnhatpr']) && ($_POST['capnhatpr'])) {
                $categori_id = $_POST['categori_id'];
                $product_id = $_POST['product_id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $img = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['img']['name']);
                if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                } else {
                    //echo "Sorry, there was an error uploading your file.";
                }
                $mo_ta = $_POST['mo_ta'];
                $number_of_view = $_POST['number_of_view'];
                update_product($product_id, $product_name, $price, $img, $mo_ta, $number_of_view, $categori_id);
                echo '<p id="mess">Đã cập nhật sản phẩm</p>';
            }
            $result = categori_all();
            $list_size = loadall_size();
            $load_product_size = load_product_size($product_id);

            if (empty($_SESSION['kyw']) || empty($_SESSION['categori'])){
                $_SESSION['kyw'][0] = '';
                $_SESSION['categori'][0] = '';
            }
            $count_product = count(loadall_product($_SESSION['kyw'][0], $_SESSION['categori'][0]));
            // echo $count_product;
            $page = ceil($count_product / 7);
            $list_product = loadall_product_admin($_SESSION['kyw'][0], $_SESSION['categori'][0], $page);

            include "./product/list_product.php";
            break;
        //account
        case 'list_account':
            $list_account = load_all_account();
            include "./account/list_account.php";
            break;
        case 'delete_account':
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0) && ($_GET['user_id'] != $_SESSION['username']['user_id'])) {
                delete_account($_GET['user_id']);
                echo '<p id="mess">Đã xóa tài khoản</p>';
            } else {
                echo '<p id="mess">Đây là tài khoản admin</p>';
            }
            $list_account = load_all_account();
            include "./account/list_account.php";
            break;
        case 'logout':
            session_unset();
            header('Location:login_admin.php');
            break;
            break;
        case 'update_account':
            if (isset($_GET['user_id']) && ($_GET['user_id'] > 0)) {
                $account = load_one_account($_GET['user_id']);
            }
            if (isset($_POST['update_account_one'])) {
                $username_update = $_POST['username'];
                $password_update = $_POST['password'];
                $email_update = $_POST['email'];
                $address_update = $_POST['address'];
                $phone_update = $_POST['phone'];
                $update_role = $_POST['role'];
                $id_update = $_POST['user_id'];
                if (!empty($_FILES['file']['name'])) {
                    //file
                    $upload_dir1 = "../upload/";
                    $upload_file1 = $upload_dir1 . basename($_FILES['file']['name']);
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file1)) {
                    }
                } else {
                    $upload_file1 = '';
                }
                update_admin($username_update, $password_update, $upload_file1, $email_update, $phone_update, $address_update, $update_role, $id_update);
                echo "<script>
                         window.location.href='index.php?act=list_account';
            </script>";
                // header('Location:index.php?act=list_account');
            }
            $list_account = load_all_account();
            include "./account/update_account_admin.php";
            break;

        //Bình luận
        case 'list_comment':
            //lấy danh sách bình luận
            $listbl = load_all_comment();
            include 'comment/list_comment.php';
            break;
        case 'delete_comment':
            //kiểm tra xem có tồn tại GET['id'] hay không
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $id = $_GET['id'];
                delete_comment($id);
                $thongbao = '<span id="mess">Đã xóa bình luận</span>';
            }
            //load lại danh sách bình luận
            $listbl = load_all_comment();
            include 'comment/list_comment.php';
            break;
        //đơn hàng
        case 'delete_cart':
            # code...
            if (isset($_GET['id'])) {
                array_splice($_SESSION['admin_cart'], $_GET['id'], 1);
            } else {
                // $_SESSION['mycart'] = [];
            }
            header("Location:index.php?act=addtocart1");
            break;
        case 'add_bill':
            if (isset($_POST['add_bill_1']) && ($_POST['add_bill_1'])) {
                $_SESSION['admin_cart'] = [];
                unset($_SESSION['user_bill']);
                if (!isset($_SESSION['user_bill'])) $_SESSION['user_bill'] = [];
                $fullname_bill = $_POST['fullname_bill'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                insert_bill_user($fullname_bill, $address, $phone);
                $user_bill = [$fullname_bill, $address, $phone];
                $_SESSION['user_bill'] = $user_bill;
            }
            include 'bill/add_bill.php';
            break;
        case 'confirmation':
            extract($_SESSION['username']);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('d/m/Y');
            $total_bill = total_cart_admin();
            if (isset($_POST['order_bill'])) {
                $pttt = $_POST['pttt'];
            }
            $id_bill = insert_new_bill($_SESSION['user_bill'][0], $_SESSION['user_bill'][1], $_SESSION['user_bill'][2], $total_bill, $pttt, 0, $user_id, $date);
            // echo '<pre>';
            // print_r($_SESSION['admin_cart']);
            foreach ($_SESSION['admin_cart'] as $cart) {
                insert_cart($_SESSION['username']['user_id'], $cart[4], $cart[3], $cart[0], $cart[5], $id_bill, $cart[1]);
            }
            // unset($_SESSION['mycart']);
            $bill = load_one_bill($id_bill);
            $bill_ct = list_cart($id_bill);
            include './bill/confirmation.php';
            unset($_SESSION['admin_cart']);
            unset($_SESSION['user_bill']);
            break;
        case 'list_product_bill':
            if (isset($_POST['search_bill']) && ($_POST['search_bill'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $list_product = loadall_product($kyw, 0);
            include './bill/list_product_bill.php';
            break;
        case 'addtocart':
            if (isset($_POST['search_bill']) && ($_POST['search_bill'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $list_product = loadall_product($kyw, 0);
            if (!isset($_SESSION['admin_cart'])) $_SESSION['admin_cart'] = [];
            if (isset($_POST['addcart'])) {
                $product_id = $_GET['product_id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $img = $_POST['img'];
                $amount = $_POST['amount'];
                $pr_size = $_POST['pr_size'];
                $total_price = $_POST['total_price'];
                $item = [$product_id, $product_name, $img, $amount, $price, $pr_size, $total_price];
                $_SESSION['admin_cart'][] = $item;
                // echo '<pre>';
                // print_r($_SESSION['admin_cart']);
            }

            include './bill/list_product_bill.php';
            break;
        case 'addtocart1':
            if (isset($_POST['search_bill']) && ($_POST['search_bill'])) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = '';
            }
            $list_product = loadall_product($kyw, 0);
            if (!isset($_SESSION['admin_cart'])) $_SESSION['admin_cart'] = [];
            if (isset($_POST['addcart'])) {
                $product_id = $_GET['product_id'];
                $product_name = $_POST['product_name'];
                $price = $_POST['price'];
                $img = $_POST['img'];
                $amount = $_POST['amount'];
                $pr_size = $_POST['pr_size'];
                $total_price = $_POST['total_price'];
                $item = [$product_id, $product_name, $img, $amount, $price, $pr_size, $total_price];
                $_SESSION['admin_cart'][] = $item;
                // echo '<pre>';
                // print_r($_SESSION['admin_cart']);
            }

            include './bill/addtocart.php';
            break;
        case 'confirmation':
            include './bill/confirmation.php';
            break;
        case 'list_bill':
            if (isset($_POST['search_bill']) && ($_POST['search_bill'])) {
                $kyw = $_POST['kyw'];
                // $bill_id = $_POST['bill_id'];
            } else {
                $kyw = '';
                // $bill_id = 0;
            }
            $listbill = load_all_bill($kyw, 0);
            include './bill/list_bill.php';
            break;
        case 'update_bill':
            $id = $_GET['id'];
            $load_one_bill = load_one_bill($id);
            // var_dump($load_one_bill);
            include './bill/update_bill.php';
            break;
        case 'updatebill':
            if (isset($_POST['capnhat_bill'])) {
                $status = $_POST['bill_status'];
                $id = $_POST['id_bill'];
                update_bill($status, $id);
            }
            $listbill = load_all_bill();
            include './bill/list_bill.php';
            break;
        case 'delete_bill':
            if (isset($_GET['bill_id'])) {
                $bill_id = $_GET['bill_id'];
                delete_bill($bill_id);
            }
            $listbill = load_all_bill();
            include './bill/list_bill.php';
            break;
        case 'detail_bill':
            $bill_id = $_GET['id'];
            $detail_bill = load_bill_detail($bill_id);
            // echo '<pre>';
            // print_r($detail_bill);
            include './bill/detail_bill.php';
            break;
        // thống kê
        case 'chart':
            $listthongke = load_all_statistical();
            include './statistical/chart.php';
            break;
        // biểu đồ
        case 'list_statistical':
            $count_bill = count_bill();
            $listthongke = load_all_statistical();
            $product_best_seller = product_best_seller();
            include './statistical/list_statistical.php';
            break;
        case 'detail':

            break;
        default:
            include '../index.php';
            break;
    }
} else {
    include './category/list_categories.php';
}

include 'footer.php';
ob_end_flush();
