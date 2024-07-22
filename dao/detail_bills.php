<?php
$arrStatus = [
    'Đơn mới',
    'Đang xử lý',
    'Đã xử lý',
    'Đang vận chuyển',
    'Nhận hàng thành công',
    'Từ chối nhận hàng',
    'Hủy đơn',
];
function insert_order($id_customer, $receiver_name, $receiver_phone, $receiver_address, $ordered_items)
{

    $sql = "INSERT INTO `bills` (`id_customer`, `receiver_name`, `receiver_phone`, `receiver_address`, `status`, `purchase_date`) 
            VALUES (?, ?, ?, ?, '0', CURRENT_TIME());";
    $id_bill = pdo_execute_bill($sql, $id_customer, $receiver_name, $receiver_phone, $receiver_address);

    if (isset($_SESSION['order_now']['id_product'])) {
        $id_product = $ordered_items[0];
        $amount = 1;
        $product = seen_product_now($ordered_items[0]);
        $name_product = $product['name'];
        $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
        detail_bill_insert($id_bill, $id_product, $name_product, $price, $amount);
    } else {
        foreach ($ordered_items as $item) {
            if (isset($_SESSION['user']['id_user'])) {
                $id_product = $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$item]['id_product'];
                $amount = $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$item]['amount'];
            } else {
                $id_product = $_SESSION["cart_user"]["customer"]["cart"][$item]['id_product'];
                $amount = $_SESSION["cart_user"]["customer"]["cart"][$item]['amount'];
            };
            $product = seen_product_cart($item);
            // var_dump($product);
            $name_product = $product['name'];
            $price = $product['price'] - ($product['price'] * $product['discount'] / 100);
            detail_bill_insert($id_bill, $id_product, $name_product, $price, $amount);
        }
    }
    cart_delete($ordered_items);
    if (isset($_SESSION['order_now'])) {
        unset($_SESSION['order_now']);
    }
}
function detail_bill_insert($id_bill, $id_product, $name_product, $price, $amount)
{

    $sql = "INSERT INTO `detail_bills` (`id_bill`, `id_product`, `name_product`, `price`, `amount`) 
        VALUES (?, ?, ?, ?, ?);";
    pdo_execute($sql,  $id_bill, $id_product, $name_product, $price, $amount);
}

function detail_bill_delete($id_detailbill)
{
    $sql = "DELETE FROM detail_bills WHERE id_detailbill=?";
    if (is_array($id_detailbill)) {
        foreach ($id_detailbill as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_detailbill);
    }
}
function pdo_execute_bill($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);

        $lastInsertId = $conn->lastInsertId();

        return $lastInsertId;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
function get_detail_bill($id_bill)
{

    $sql = "SELECT b.*,d.*
    FROM `bills` b 
    INNER JOIN detail_bills d ON b.id_bill = d.id_bill 
    WHERE b.`id_bill` = ?;";
    return pdo_query($sql, $id_bill);
}
function get_img($id_product)
{

    $sql = "SELECT p.img_product
    FROM `detail_bills` d 
    INNER JOIN products p ON p.id_product = d.id_product 
    WHERE d.`id_product` = ?;";
    return pdo_query_one($sql, $id_product);
}
