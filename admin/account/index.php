<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/reset.css" />
    <link rel="stylesheet" href="../../css/admin/main/style.css">
    <link rel="stylesheet" href="../../css/admin/acount.css">
    <link rel="stylesheet" href="../../css/admin/account-customers.css">
    <link rel="stylesheet" href="../../css/admin/account-staff.css">
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php
include "../../global.php";
check_login();
include "../../dao/pdo.php";
include "../../dao/users.php";
include "../../dao/customers.php";
include "../../dao/bills.php"

?>

<body>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php";
            ?>
            <div class="information-system">
                <?php
                if (isset($_GET['customer'])) {
                    include "../account/account_customers.php";
                } else if (isset($_GET['staff'])) {
                    include "../account/account_staff.php";
                } else if (isset($_GET['admin'])) {
                    include "../account/account_admin.php";
                } else if (isset($_GET['customers_edit'])) {
                    include "../account/customers/customer_edit.php";
                } else if (isset($_GET['staff_edit'])) {
                    include "../account/staff/staff_edit.php";
                } else if (isset($_GET['staff_delete'])) {
                    include "../account/staff/staff_delete.php";
                } else if (isset($_GET['staff_add'])) {
                    include "../account/staff/staff_add.php";
                } else if (isset($_POST['btn-update']) && $_POST['btn-update']) {
                    try {
                        user_update($_POST['id_user'], $_POST['email'], $_POST['role']);
                        $MESSAGE = "Cập nhật thông tin thành công!";
                    } catch (Exception $exc) {
                        $MESSAGE = $exc;
                    } finally {
                        echo  $MESSAGE;
                        include "../account/account.php";
                    }
                }
                // Insert 
                else if (isset($_POST['btn-insert']) && $_POST['btn-insert']) {
                    try {
                        user_insert($_POST['email'], $_POST['password'], $_POST['role']);
                        $MESSAGE = "Cập nhật thông tin thành công!";
                    } catch (Exception $exc) {
                        $MESSAGE = $exc;
                    } finally {
                        echo  $MESSAGE;
                        include "../account/account.php";
                    }
                } else {

                    include "../account/account.php";
                }
                ?>

            </div>
        </div>
    </div>
</body>

</html>