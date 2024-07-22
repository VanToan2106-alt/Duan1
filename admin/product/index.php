<?php
require "../../global.php";
include "../../dao/pdo.php";
include "../../dao/products.php";
//--------------------------------//
check_login();
// extract($_REQUEST);
if (array_key_exists("btn_insert", $_POST)) {
    try {
        $file_name = save_file("img_product", "$IMAGE_DIR/shop/");
        $img = $file_name ? $file_name : "";
        product_insert($_POST['id_product'], $_POST['id_category'], $_POST['firms'], $_POST['name'], $_POST['price'], $_POST['discount'], $_POST['description'], $img, isset($_POST['censorship']) ? $_POST['censorship'] : 0, isset($_POST['view']) ? $_POST['view'] : 0);
        echo "Thêm mới thành công!";
    } catch (Exception $exc) {
        // $MESSAGE = "Thêm mới thất bại!";
        echo $exc;
    }
    header("location: $ROOT_URL/admin/product/new.php");
} else if (array_key_exists("btn_update", $_POST)) {
    try {
        $productId = $_POST['id_product'];
        $item = get_info_product($productId);
        // extract($_REQUEST);
        $file_name = save_file("img_product", "$IMAGE_DIR/shop/");
        $img = $file_name ? $file_name : "";
        product_update($_POST['id_product'], $item['id_category'], $_POST['firms'], $_POST['name'], $_POST['price'], $_POST['discount'], $_POST['description'], $img);
        $MESSAGE = "Cập nhật thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Cập nhật thất bại!";
    }
    header("location: $ROOT_URL/admin/product/list.php");
} else if (array_key_exists("btn_delete", $_POST)) {
    try {
        // extract($_REQUEST);
        product_delete($_POST['id_product']);
        $item = get_info_product($_POST['id_product']);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    header("location: $ROOT_URL/admin/product/list.php");
}
