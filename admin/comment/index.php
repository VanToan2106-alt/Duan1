<?php
require "../../global.php";
include "../../dao/pdo.php";
include "../../dao/comments.php";
//--------------------------------//
check_login();
extract($_REQUEST);
if (array_key_exists("btn_delete", $_POST)) {
    try {
       comments_delete($id_comment);
        $items = comments_select_by_id($id_comment);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    header("location: $ROOT_URL../admin/comment/show.php");
} 
