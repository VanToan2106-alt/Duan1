<?php
function bill_insert($id_bill, $id_user, $receiver_name, $receiver_phone, $receiver_address)
{
    $sql = "INSERT INTO `bills` (`id_bill`, `id_user`, `receiver_name`, `receiver_phone`, `receiver_address`, `status`, `purchase_date`, `updated_at`) 
    VALUES (?, ?, ?, ?, ?, '0', CURRENT_TIME(), CURRENT_TIME());";
    pdo_execute($sql, $id_bill, $id_user, $receiver_name, $receiver_phone, $receiver_address);
}
function bill_update($id_bill, $receiver_name, $receiver_phone, $receiver_address)
{
    $sql = "UPDATE `bills` 
    SET `receiver_name` = ?, `receiver_phone` = ?, `receiver_address` = ?, `updated_at` = CURRENT_TIME() 
    WHERE `bills`.`id_bill` = ?;";
    pdo_execute($sql, $receiver_name, $receiver_phone, $receiver_address, $id_bill);
}
function bill_delete($id_bill)
{
    $sql = "DELETE FROM bills WHERE id_bill=?";
    if (is_array($id_bill)) {
        foreach ($id_bill as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_bill);
    }
}
function bill_update_status($id_bill, $status)
{
    $sql = "UPDATE `bills` 
    SET `status` = ?
    WHERE `bills`.`id_bill` = ?;";
    pdo_execute($sql, $status, $id_bill);
}
function get_bill_id_customer($id_customer)
{

    $sql = "SELECT MAX(id_bill) as info
    FROM `bills` 
    WHERE `bills`.`id_customer` = ?;";
    return pdo_query_one($sql, $id_customer);
}

function count_status_bills($status)
{
    $sql = "SELECT count(*) as count_bills FROM bills where status = ?";
    return pdo_query_one($sql, $status);
}

function get_bills_status($status)
{
    $sql = "SELECT * FROM bills where status = ?";
    return pdo_query($sql, $status);
}

function get_id_bills($id_bill)
{
    $sql = "SELECT * FROM bills where id_bill = ?";
    return pdo_query_one($sql, $id_bill);
}

function get_bills_customer_status($id_customer, $status)
{
    $sql = "SELECT * FROM bills where id_customer = ? and status = ?";
    return pdo_query($sql, $id_customer, $status);
}

function count_all_bills()
{
    $sql = "SELECT count(*) as count_all_bills FROM bills";
    return pdo_query_one($sql);
}

