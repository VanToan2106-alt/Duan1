<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/user/user_changePass/style.css">
    <link rel="stylesheet" href="../css/user/user_information/style.css">
    <link rel="stylesheet" href="../css/user/user_shopCart/style.css">
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
include "../global.php";
include('../dao/pdo.php');
include('../dao/products.php');
include('../dao/users.php');
include('../dao/carts.php');
include('../dao/bills.php');
include('../dao/customers.php');
include('../dao/detail_bills.php');
check_login();
?>
<style>
    .change-information {
        background-color: white;
    }
</style>

<body>
    <div class="main">
        <?php
        include "../users-manage/layout/sideBar-user.php"
        ?>
        <div class="change-information">
            <?php
            if (isset($_GET['change_pass'])) {
                include "../users-manage/user_changePass/change_pass.php";
            } else if (isset($_GET['my_cart'])) {
                $list_adress = get_user_customers_bill($_SESSION['user']['id_user']);
                $statusBill = $_GET['status'] ?? 0;
                include "../users-manage/user_shop/user_cart.php";
            } else if (isset($_GET['home_view'])) {
                $user =  users_select_by_id($_SESSION['user']['id_user']);
                $list_adress = get_user_customers_bill($_SESSION['user']['id_user']);
                include "../users-manage/user_Profile/user_info.php";
            } else if ((isset($_GET['add-customer'])) || (isset($_GET['edit-user'])) || (isset($_GET['edit-customer']) && $_GET['edit-customer'] != '')) {
                if (isset($_GET['edit-customer'])) {
                    $info_customer = get_info_customer($_GET['edit-customer']);
                }
                $user =  users_select_by_id($_SESSION['user']['id_user']);
                include "../users-manage/user_Profile/edit_user.php";
            } else {
                $user =  users_select_by_id($_SESSION['user']['id_user']);
                $list_adress = get_user_customers_bill($_SESSION['user']['id_user']);
                include "../users-manage/user_Profile/user_info.php";
            }
            ?>

        </div>
    </div>
</body>



</html>