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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
include "../../global.php";
check_login();
include "../../dao/pdo.php";
include "../../dao/users.php";
include "../../dao/customers.php";
include "../../dao/bills.php";
include "../../dao/detail_bills.php";
?>

<body>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php";
            ?>
            <div class="information-system">
                <?php
                // Xử lý đơn hàng
                if (isset($_GET['approveid']) && $_GET['approveid']) {
                    // $get_bills = get_id_bills($id_bill);
                    // $status =  $get_bills['status'] + 1;
                    $id_bill = $_GET['approveid'];
                    $status = $_GET['change'];
                    try {
                        //code...
                        bill_update_status($id_bill, $status);
                    } catch (Exception $exc) {
                        //throw $th;
                        $mess = $exc;
                        // var_dump($mess);
                    }
                        echo "<script language='javascript'>
                        window.location.href = '" . $ROOT_URL . "/admin/bills/index.php';
                     </script>";
                }
                if (isset($_GET['status'])) {
                    include "../bills/bills_processing.php";
                } else {
                    include "../bills/manage-bill.php";
                }

                ?>

            </div>
        </div>
    </div>
</body>

</html>