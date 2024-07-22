<?php
function user_insert($email, $password, $role)
{
    $sql = "INSERT INTO users(`email`,`password`,`role`) 
    VALUES (?,?,?)";
    pdo_execute($sql, $email, $password, $role);
}

function user_register($email, $password)
{
    $sql = "INSERT INTO users(`email`,`password`) 
    VALUES (?,?)";
    pdo_execute($sql, $email, $password);
}

function user_update($id_user, $email, $role)
{
    $sql = "UPDATE users
    SET  `email`=?,`role`=?
    WHERE id_user = ?";
    // intval => chuỗi sang số nguyên
    $role = intval($role);
    pdo_execute($sql, $email, $role, $id_user);
}
function user_update_private($id_user, $email)
{
    $sql = "UPDATE users
    SET  `email`=?
    WHERE id_user = ?";
    pdo_execute($sql, $email,  $id_user);
}
function user_delete($id_user)
{
    $sql = "DELETE FROM users WHERE id_user=?";
    if (is_array($id_user)) {
        foreach ($id_user as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $id_user);
    }
}
function users_exist($email, $password)
{
    $email = "$email";
    $password = "$password";
    $err = "";
    $sql = "SELECT count(*) as count FROM users WHERE email LIKE ?";
    $check_exist = pdo_query_one($sql, $email);
    if ($check_exist['count'] == 0) {
        $err = "Bạn đã nhập email đăng nhập sai hoặc không tồn tại.";
        return $err;
    } else {
        $sql = "SELECT * FROM users WHERE `email` LIKE ? AND `password` LIKE ?";
        $check_exist = pdo_query_one($sql, $email, $password);
        if (empty($check_exist)) {
            $err = "Nhập sai mật khẩu, vui lòng nhập lại.";
            return $err;
        } else {
            return $check_exist;
        }
    }
}
function users_select_by_id($id_user)
{
    $sql = "SELECT * FROM users WHERE id_user=?";
    return pdo_query_one($sql, $id_user);
}
function users_select_by_role($role)
{
    $sql = "SELECT * FROM users WHERE role=?";
    return pdo_query($sql, $role);
}
function users_change_password($id_user, $email, $new_password)
{
    $email = "$email";
    $sql = "UPDATE users SET `password`=? WHERE id_user=? and email like ?";
    pdo_execute($sql, $new_password, $id_user, $email);
}

function getAll_user()
{
    $sql = "SELECT * FROM users";
    return pdo_query($sql);
}

function getAll_customers()
{
    $sql = "SELECT * FROM users WHERE role = 0";
    return pdo_query($sql);
}

function getAll_staff()
{
    $sql = "SELECT * FROM users WHERE role = 1";
    return pdo_query($sql);
}

function getAll_Admin()
{
    $sql = "SELECT * FROM users WHERE role = 2";
    return pdo_query($sql);
}

function count_customers()
{
    $sql = "SELECT COUNT(*) AS total_customers FROM users WHERE role = 0";
    return pdo_query($sql);
}
function count_staffs()
{
    $sql = "SELECT COUNT(*) AS total_customers FROM users WHERE role = 1";
    return pdo_query($sql);
}

function count_admin()
{
    $sql = "SELECT COUNT(*) AS total_customers FROM users WHERE role = 2";
    return pdo_query($sql);
}
function check_email($email)
{
    $email = "$email";
    $err = "";
    $sql = "SELECT u.id_user, u.email FROM users u WHERE email LIKE ?";
    $check_exist = pdo_query_one($sql, $email);
    if (empty($check_exist)) {
        $err = "Email bạn nhập sai hoặc chưa đăng kí thành viên.";
        return $err;
    } else {
        return $check_exist;
    }
}

function count_all_users()
{
    $sql = "SELECT count(*) as count_all_users FROM users";
    return pdo_query_one($sql);
}
