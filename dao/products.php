<?php
function product_insert($id_product, $id_category, $firms, $name, $price, $discount, $description, $img_product, $censorship, $view)
{
    $sql = "INSERT INTO products(`id_product`, `id_category`, `firms`, `name`, `price`, `discount`, `description`, `img_product`, `censorship`, `view`,`created_at`,`updated_at`) 
    VALUES (?,?,?,?,?,?,?,?,?,?,current_timestamp(),current_timestamp())";
    pdo_execute($sql, $id_product, $id_category, $firms, $name, $price, $discount, $description, $img_product, $censorship, $view);
}
function product_update($id_product, $id_category, $firms, $name, $price, $discount, $description, $img_product)
{
    $sql = "UPDATE products
    SET  `id_category` = ?, `firms` = ?, `name` = ?, `price` = ?, `discount` = ?, `description` = ?, `img_product` = ?, `updated_at` = current_timestamp()
    WHERE id_product = ?";
    pdo_execute($sql, $id_category, $firms, $name, $price, $discount, $description, $img_product, $id_product);
}
function product_delete($id_product)
{
    $sql = "DELETE FROM products WHERE id_product=?";
    if (is_array($id_product)) {
        foreach ($id_product as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_product);
    }
}
function get_all_products()
{
    $sql = "SELECT * FROM products";
    return pdo_query($sql);
}
function get_product_category($id_category, $limit, $offset)
{
    $sql = "SELECT * FROM products where `id_category` = ? AND `censorship` = 2 limit " . (int)$limit . " OFFSET " . (int)$offset;
    return pdo_query($sql, $id_category);
}
function get_product_name_firms_category($id_category)
{
    $sql = "SELECT products.firms FROM products where `id_category` = ?";
    $nameFirms = pdo_query($sql, $id_category);
    $arrFimrs = array();
    foreach ($nameFirms as $firms) {
        array_push($arrFimrs, $firms['firms']);
    }
    return array_unique($arrFimrs);
}

function count_product_search_firms($search)
{
    $searchkey = "%{$search}%";
    $sql = "SELECT * FROM products where firms like ? and censorship = 2";
    return count(pdo_query($sql, $searchkey));
}
function count_product_search_name($search)
{
    $searchkey = "%{$search}%";
    $sql = "SELECT * FROM products where `name` like ? and censorship = 2";
    return count(pdo_query($sql, $searchkey));
}
function get_product_firms($firms, $limit, $offset)
{
    $firmskey = "%{$firms}%";
    $sql = "SELECT * FROM products where firms like ? and censorship = 2 limit " . (int)$limit . " OFFSET " . (int)$offset;
    return pdo_query($sql, $firmskey);
}
function get_product_search_name($search, $limit, $offset)
{
    $searchkey = "%{$search}%";
    $sql = "SELECT * FROM products where `name` like ? and censorship = 2 limit " . (int)$limit . " OFFSET " . (int)$offset;
    return pdo_query($sql, $searchkey);
}
function count_all_products()
{
    $sql = "SELECT COUNT(*) as total FROM products where censorship = 2";
    return pdo_query($sql);
}
function count_product_category($id_category)
{
    $sql = "SELECT COUNT(*) AS total FROM products where id_category = ? and censorship = 2";
    return pdo_query($sql, $id_category);
}

function get_censorship_products($censorship, $limit, $offset)
{
    $sql = "SELECT * FROM products WHERE censorship = ?";
    return pdo_query($sql, $censorship, $limit, $offset);
}
function get_products_limit($limit, $offset)
{
    $sql = "SELECT * FROM products WHERE censorship = 2 LIMIT " . (int)$limit . " OFFSET " . (int)$offset;
    return pdo_query($sql);
}
function get_products_new($limit)
{
    $sql = "SELECT * FROM products having censorship = 2 ORDER BY created_at DESC LIMIT ?";
    return pdo_query($sql, $limit);
}
function get_products_high_views($limit)
{
    $sql = "SELECT * FROM products having censorship = 2 ORDER BY view DESC LIMIT ?";
    return pdo_query($sql, $limit);
}
function get_info_product($id)
{
    $sql = "SELECT * FROM products where id_product = ?";
    return pdo_query_one($sql, $id);
}

function upview_product($id)
{
    $sql = "UPDATE products
    SET view = view + 1
    WHERE id_product = ?";
    pdo_execute($sql, $id);
}
function censorship_product($id_product, $censorship)
{
    $sql = "UPDATE products
    SET censorship = ?
    WHERE id_product = ?";
    if (is_array($id_product)) {
        foreach ($id_product as $id) {
            pdo_execute($sql, $id, $censorship);
        }
    } else {
        pdo_execute($sql, $id_product, $censorship);
    }
}

function count_all_product()
{
    $sql = "SELECT count(*) as count_all_products FROM products";
    return pdo_query_one($sql);
}
