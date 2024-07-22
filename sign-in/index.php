<?php
include('../global.php');
include('../dao/pdo.php');
include('../dao/users.php');
if (isset($_POST['login']) && $_POST['login']) {
    $user_login = users_exist($_POST['email'], $_POST['password']);
    if (is_string($user_login)) {
        $_SESSION["err"] = $user_login;
        header("location: $ROOT_URL/sign-in/sign-in.php");
    } else {
        if (isset($remember)) {
            add_cookie("email_user", $_POST['email'], 30);
            add_cookie("password_user", $_POST['password'], 30);
        } else {
            delete_cookie("email_user");
            delete_cookie("password_user");
        }
        $_SESSION["user"] = $user_login;
        unset($_SESSION['err']);
        if (isset($_SESSION['customer_order'])) {
            unset($_SESSION['customer_order']);
        }
        header("location: $ROOT_URL/home");
    }
} else {
    if (isset($_GET['logout'])) {
        unset($_SESSION["user"]);
        if (isset($_SESSION['customer_order'])) {
            unset($_SESSION['customer_order']);
        }
        $email_user = get_cookie("email_user");
        $password_user = get_cookie("password_user");
    }
    header("location: $ROOT_URL/sign-in/sign-in.php");
}
