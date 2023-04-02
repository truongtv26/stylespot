
<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/stylespot/model/pdo.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/stylespot/model/user.php';
// Xử lí thời gian bình luận
function handleCommentTime($from) {
    $result = '';
    $from = new DateTime($from);
    $to = new DateTime(date("Y-m-d H:i:s"));

    if ($from->diff($to) === null) {
        echo "Không thể chuyển DateInterval object thành array";
    } else {
        $arraytmp = get_object_vars($from->diff($to));
        $array = array_slice($arraytmp, 0, 6);
        $string = ['năm trước', 'tháng trước', 'ngày trước', 'giờ trước', 'phút trước', 'giây'];
        $newArray = array_combine($string, $array);

        foreach ($newArray as $key => $val) {
            if($val > 0) {
                $result = $val . ' ' . $key;
                break;
            } else {
                $result = 'Vừa xong';
            }
        }

    }
    return $result;
}


// hiển thị bình luạn và trả lời bình luận
$root_comment_id = -1;
function showComments($comments, $parent_id = -1) {
    $html = '';
    global $root_comment_id;
    if ($parent_id != -1) {
        // sắp xếp trả lời bình luận theo ngày bình luận
        array_multisort(array_column($comments, 'date_comment'), SORT_ASC, $comments);
    }

    // lặp tất cả bình luận và trả lời bình luận theo id Sản Phẩm
    foreach ($comments as $comment) {

        if ($comment['parent_id'] == $parent_id ) {
            if ($comment['parent_id'] == -1) {
                $root_comment_id = $comment['comment_id'];
            }
            // tính toán thời gian bình luạna
            $commentTime = handleCommentTime($comment['date_comment']);
            //lấy thông tin người dùng và sản phẩm từ id
            $user = getUser('',$comment['user_id']);
            $imgUser = $user['avatar'];
            // tạo html comment và rep comment theo cấu trúc dạng cây
            $html .= '
          <div class="row w-100 comment border-0 m-0 p-0">
        <!--  -->
        <div class="col-12 p-0">
            <div class="media g-mb-30 media-comment d-flex pl-2">
                <img style="width: 50px;" class="d-flex g-width-50 g-height-50 rounded-circle g-mt-3 g-mr-15d mx-1" src="'.$imgUser.'" alt="Image Description">
                <div class="media-body w-100 " style="padding-left:20px">
                  <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">'.$user['username'].'</h5>
                    <span class="g-color-gray-dark-v4" style="font-size: 12px;">'.$commentTime.'</span>
                  </div>
                  <p>'.$comment['content'].'</p>
                  <ul class="list-inline d-sm-flex my-0">
                                        
                    <li class="list-inline-item ml-auto my-0 w-100">
                        <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover text-decoration-none d-flex align-items-baseline gap-1 rep-btn" href="#!" parent-id="'.$comment['comment_id'].'">
                          <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                          <p class="text-nowrap">Trả lời</p>
                        </a>
                        <!-- Form write comment -->
                        ' . commentForm($root_comment_id) . '
                        <!-- end form  -->
                    </li>
                    </ul>
                    <!-- subcomment -->
                    ' . showComments($comments, $comment['comment_id']) . '
                    <!--  -->
                  </ul>
                </div>
            </div>
        </div>
        <!--  -->
    </div>
          ';
        }
    }
    return $html;
}

// hiển thị form comment
function commentForm($parent_id = -1, $display = 'none') {

    $html = '
  <div class="write_comment mb-3" parent-id="'.$parent_id.'" style="display:'.$display.'">
      <form class="align-items-start form-comment" method="post">
          <input name="parent_id" type="hidden" value="'.$parent_id.'">
          <textarea class="form-control w-100" rows="3"  name="content" placeholder="Viết đánh giá cho sản phẩm này..." required></textarea>
          <button class="btn btn-primary mt-1" type="submit">Gửi</button>
      </form>
  </div>
  ';
    return $html;
}

// select sản phẩm theo id sản phẩm
$pdo = pdo_get_connection();
$idSanPham = $_GET['product_id'];
$stmt = $pdo->prepare('SELECT * FROM comment WHERE product_id = '.$idSanPham.' ORDER BY date_comment ASC');
$stmt->execute();
$comments = $stmt->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['content']) && $_SESSION['username']) {
    $parent_id = $_POST['parent_id'];
    $userId = $_SESSION['username']['user_id'];
    $content = $_POST['content'];
    $prodId  = $_GET['product_id'];
    $now = date("Y-m-d H:i:s");

    $sql = "INSERT INTO comment (`parent_id`, `content`, `product_id`, `user_id`, `date_comment`) VALUES
      ('$parent_id', '$content', '$prodId','$userId', '$now')";
    pdo_query($sql);
}
?>

<?php
if (isset($_SESSION['username'])) {
    echo commentForm(-1,'block');
} else {
    echo 'Vui lòng đăng nhập để bình luận';
}
?>

<?php echo showComments($comments)?>

<?php
