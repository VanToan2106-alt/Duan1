<?php
require "../../global.php";
include "../../dao/pdo.php";
include "../../dao/categories.php";
//--------------------------------//
check_login();
extract($_REQUEST);
if (array_key_exists("btn_insert", $_POST)) {
    try {
        categories_insert($id_category, $name);
        unset($name, $id_category);
        $MESSAGE = "Thêm mới thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Thêm mới thất bại!";
    }
    header("location: $ROOT_URL/admin/categories/list.php");
} else if (array_key_exists("btn_update", $_POST)) {
    try {
        categories_update($id_category, $name);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
        // var_dump(); 
        echo "<p>" . $exc . "</p>";
    }
    // $VIEW_NAME = "categories/edit.php";
    header("location: $ROOT_URL/admin/categories/list.php");
} else if (array_key_exists("btn_delete", $_POST)) {
    try {
        categories_delete($id_category);
        $items = get_all_categories_id($id_category);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    header("location: $ROOT_URL/admin/categories/list.php");
}else{
    header("location: $ROOT_URL/admin/categories/new.php");

}
