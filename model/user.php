<?php
function insert_client_user($username, $password, $avatar, $address, $phone, $email)
{
  $sql = "INSERT INTO user(username,password,avatar,address,phone,email) VALUES('$username','$password','$avatar','$address','$phone','$email') ";
  pdo_execute($sql);
}
function insert_bill_user($username, $address, $phone)
{
  $sql = "INSERT INTO user(username,address,phone) VALUES('$username','$address','$phone') ";
  pdo_execute($sql);
}
function checkuser($username, $password)
{
  $sql = "select *from user where username='" . $username . "' and password='" . $password . "'";
  $user = pdo_query_one($sql);
  return $user;
}
function update_status($status,$user_id)
{
  $sql = "UPDATE `user` SET `status` = '$status' WHERE `user`.`user_id` =" . $user_id;
  pdo_execute($sql);
}
function check_user_bill($username)
{
  $sql = "select *from user where username='" . $username . "'";
  $user = pdo_query_one($sql);
  return $user;
}
function update_user($user_id, $username, $password, $avatar, $address, $phone, $email)
{
  if ($avatar != "") {
    $sql = "update user set username='" . $username . "',password='" . $password . "',avatar='" . $avatar . "',address='" . $address . "',phone='" . $phone . "',email='" . $email . "' where user_id= " . $user_id;
  } else {
    $sql = "update user set username='" . $username . "',password='" . $password . "',address='" . $address . "',phone='" . $phone . "',email='" . $email . "' where user_id= " . $user_id;
  }
  pdo_execute($sql);
}
function update_admin($username, $password, $avatar, $email, $phone, $address, $role, $user_id)
{
  if ($avatar != "") {
    $sql = "UPDATE `user` SET `username` = '$username', `password` = '$password', `avatar` = '$avatar', `email` = '$email', `phone` = '$phone', `address` = '$address', `role` = '$role' WHERE `user`.`user_id` =" . $user_id;
  } else {
    $sql = "UPDATE `user` SET `username` = '$username', `password` = '$password', `email` = '$email', `phone` = '$phone', `address` = '$address', `role` = '$role' WHERE `user`.`user_id` =" . $user_id;
  }
  pdo_execute($sql);
}
function check_password($username, $email, $phone)
{
  $sql = "select *from user where username='" . $username . "'and email='" . $email . "'and phone='" . $phone . "' ";
  $user = pdo_query_one($sql);
  return $user;
}
function load_all_account()
{
  $sql = "SELECT * FROM user ORDER BY user_id asc ";
  $list_account = pdo_query($sql);
  return $list_account;
}

function load_one_account($user_id)
{
  $sql = "SELECT * FROM user WHERE user_id=" . $user_id;
  $ud = pdo_query_one($sql);
  return $ud;
}

function delete_account($user_id)
{
  $sql = "delete from user where user_id=" . $user_id;
  pdo_execute($sql);
}

function getUser($field = '', $user_id) {
    $sql = "";
    if (empty($field))
        $sql .= "SELECT * FROM user";
    else
        $sql .= "SELECT $field FROM usert";

    $sql .= " WHERE user_id = '$user_id'";

    return pdo_query_one($sql);
}
