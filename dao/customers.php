<?php
function customers_insert($id_user, $full_name, $phone, $address, $note)
{
    $sql = "INSERT INTO customers(`id_user`, `full_name`, `phone`, `address`,`note`) 
    VALUES (?,?,?,?,?)";
    $id_customer = pdo_execute_customer($sql, $id_user, $full_name, $phone, $address, $note);
    return $id_customer;
}
function customers_update($id_customer, $id_user, $full_name, $phone, $address, $note)
{
    $sql = "UPDATE customers
    SET  `id_user`= ?, `full_name` = ?, `phone` = ?, `address` = ?,`note` = ?
    WHERE id_customer = ?";
    pdo_execute($sql, $id_user, $full_name, $phone, $address, $note, $id_customer);
}
function customers_delete($id_customer)
{
    $sql = "DELETE FROM customers WHERE id_customer=?";
    if (is_array($id_customer)) {
        foreach ($id_customer as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_customer);
    }
}
function pdo_execute_customer($sql)
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
function get_all_customers()
{
    $sql = "SELECT * FROM customers";
    return pdo_query($sql);
}
function get_user_customers($id_user)
{
    $sql = "SELECT * FROM customers where id_user = ?";
    return pdo_query_one($sql, $id_user);
}
function get_user_customers_bill($id_user)
{
    $sql = "SELECT * FROM customers where id_user = ?";
    return pdo_query($sql, $id_user);
}
function get_info_customer($id_customer)
{
    $sql = "SELECT * FROM customers where id_customer = ?";
    return pdo_query_one($sql, $id_customer);
}
