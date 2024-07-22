<?php
function comments_insert($id_comment, $id_product, $id_user, $content, $censorship)
{
    $sql = "INSERT INTO comments(`id_comment`,`id_product`, `id_user`, `content`,`censorship`,`day_post`, `updated_at`) 
    VALUES (?,?,?,?,?,CURRENT_TIMESTAMP(),CURRENT_TIMESTAMP())";
    pdo_execute($sql, $id_comment, $id_product, $id_user, $content, $censorship);
}
function comments_update($id_product, $id_user, $content)
{
    $sql = "UPDATE comments
    SET  `content` = ?, `updated_at` = current_timestamp()
    WHERE id_product = ? and id_user = ?";
    pdo_execute($sql, $content, $id_product, $id_user);
}
function comments_delete($id_comment)
{
    $sql = "DELETE FROM comments WHERE id_comment=?";
    if (is_array($id_comment)) {
        foreach ($id_comment as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_comment);
    }
}
function get_all_comments()
{
    $sql = "SELECT  h.name, COUNT(b.id_product) as count, b.id_product FROM comments b JOIN products h ON h.id_product=b.id_product 
    GROUP BY b.id_product";
    return pdo_query($sql);
}
function comments_update_censorship($id_comment, $content)
{
    $sql = "UPDATE comments
    SET  `content` = ?, `updated_at` = current_timestamp()
    WHERE id_comment = ?";
    pdo_execute($sql, $content, $content, $id_comment);
}
function comments_product($id_product)
{
    $sql = "SELECT c.*, u.email FROM comments c INNER JOIN users u ON c.id_user = u.id_user 
    WHERE c.id_product=? and c.censorship = 2 ORDER BY day_post DESC";
    return pdo_query($sql, $id_product);
}
function all_comments_product($id_product)
{
    $sql = "SELECT c.*, u.full_name, u.avatar FROM comments c INNER JOIN users u ON c.id_user = u.id_user 
    WHERE c.id_product=? ORDER BY day_post DESC";
    return pdo_query($sql, $id_product);
}
function get_currenttime()
{
    $sql = "SELECT CURRENT_TIMESTAMP as currentTime;";
    return pdo_query_one($sql);
}
function comments_select_by_id($id_comment)
{
    $sql = "SELECT * FROM comments WHERE id_comment=?";
    return pdo_query_one($sql, $id_comment);
}

function count_all_comments()
{
    $sql = "SELECT count(*) as count_all_commments FROM comments";
    return pdo_query_one($sql);
}
