<?php
function rates_insert($id_rate, $id_product, $id_user, $point)
{
    $sql = "INSERT INTO rates(`id_rate`,`id_product`, `id_user`, `point`, `updated_at`) 
    VALUES (?,?,?,?,CURRENT_TIMESTAMP())";
    pdo_execute($sql, $id_rate, $id_product, $id_user, $point);
}
function rates_update($id_product, $id_user, $point)
{
    $sql = "UPDATE rates
    SET  `point` = ?, `updated_at` = current_timestamp()
    WHERE id_product = ? and id_user = ?";
    pdo_execute($sql, $point, $id_product, $id_user);
}
function rates_delete($id_rate)
{
    $sql = "DELETE FROM rates WHERE id_rate=?";
    if (is_array($id_rate)) {
        foreach ($id_rate as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_rate);
    }
}
function rates_product($id_product)
{
    $sql = "SELECT AVG(point) as rate_product, count(id_product) as total_rate FROM rates WHERE id_product=?";
    return pdo_query_one($sql, $id_product);
}
function get_all_rates()
{
    $sql = "SELECT  h.name, COUNT(b.id_product) as count, b.id_product FROM rates b JOIN products h ON h.id_product = b.id_product 
    GROUP BY b.id_product";
    return pdo_query($sql);
}
