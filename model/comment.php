<?php
function insert_comment($content, $product_id,$user_id,$date_comment){
    $sql ="INSERT INTO comment (content,product_id,user_id,date_comment) VALUES ('$content','$product_id','$user_id','$date_comment')";
    pdo_execute($sql);
}
function load_all_cmt($product_id){
    $sql  ="SELECT * FROM comment JOIN user ON comment.user_id=user.user_id JOIN product ON comment.product_id=product.product_id WHERE 1";
    if($product_id >0){
    $sql.=" AND comment.product_id='".$product_id."'";
     } else
    $sql .="ORRDER BY id DESC";
    $listbl = pdo_query($sql);
    return $listbl;
}
function load_all_comment(){
    $sql = "SELECT * FROM comment ORDER BY comment_id desc";
    $listbinhluan = pdo_query($sql);
    return $listbinhluan;
}
function delete_comment($id){
    $sql ="DELETE FROM comment WHERE  comment_id =".$id;
    pdo_execute($sql);
}
