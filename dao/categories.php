<?php

function categories_insert($id_category, $name)
{
    $sql = "INSERT INTO categories(`id_category`, `name`, `created_at`, `updated_at`) 
    VALUES (?,?,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())";
    pdo_execute($sql, $id_category, $name);
}
function categories_update($id_category, $name)
{
    $sql = "UPDATE categories
    SET  `name` = ?, `updated_at` = current_timestamp()
    WHERE id_category = ?";
    pdo_execute($sql, $name, $id_category);
}
function categories_delete($id_category)
{
    $sql = "DELETE FROM categories WHERE id_category=?";
    if (is_array($id_category)) {
        foreach ($id_category as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_category);
    }
}
function get_all_categories()
{
    $sql = "SELECT * FROM categories";
    return pdo_query($sql);
}
function get_all_categories_id($id_category)
{
    $sql = "SELECT * FROM categories WHERE id_category=?";
    return pdo_query_one($sql, $id_category);
}
function count_all_categories()
{
    $sql = "SELECT count(*) as count_all_categories FROM  categories";
    return pdo_query_one($sql);
}
