<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/reset.css">
    <link rel="stylesheet" href="../../css/admin/main/style.css">
    <link rel="stylesheet" href="../../css/admin/bills/style.css">
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/detail_bills.php";
include "../../dao/bills.php";
// $bills = get_all_bills();
?>

<body>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <div class="menu-info">
                    <div class="dasboard">
                        <p>
                            <i class="fa-sharp fa-solid fa-bars"></i>
                        <p>Dashboard</p>
                        </p>
                    </div>
                    <div class="admin">
                        <div class="admin-info">
                            <img src="https://qph.cf2.quoracdn.net/main-qimg-ae9a489a8a257fe1cc8d38c693389ab1-lq" alt="">
                            <p class="text-admin">Admin</p>
                        </div>

                        <div class="text-online">
                            <p>Online</p>
                        </div>
                    </div>
                </div>
                <div class="manage-list_bills">
                    <div class="manage-cate-list">
                        <h2>Danh sách đơn hàng</h2>
                        <hr class="new1">
                        <form action="index.php" method="post">
                            <table class="bills-table-list">
                                <thead>
                                    <tr>
                                        <th>Mã đơn hàng</th>
                                        <th>Tên người nhận</th>
                                        <th>SĐT người nhận</th>
                                        <th>Địa chỉ người nhận</th>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Ngày mua</th>
                                        <th>Chức năng</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($bills as $item) {
                                    ?>
                                        <tr>

                                            <td><?= $item["id_bill"] ?></td>
                                            <td><?= $item["receiver_name"] ?></td>
                                            <td><?= $item["receiver_phone"] ?></td>
                                            <td><?= $item["receiver_address"] ?></td>
                                            <td><?= $arrStatus[$item['status']] ?></td>
                                            <td><?= $item["purchase_date"] ?></td>
                                            <td>
                                                <a href="detailbill.php?id_bill=<?= $item['id_bill'] ?>" class="edit-cate">Xem chi tiết</a>

                                            </td>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>


                            </table>
                    </div>


                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

<script>
    window.addEventListener("load", function(e) {
        const lis = document.querySelectorAll("li");
        lis.forEach((item) => {
            const icon = item.querySelector(".icon_side");
            item.addEventListener("mouseenter", function(e) {
                icon.style.transition = "0.5s";
                icon.style.transform = "scale(2)";
            });
            item.addEventListener("mouseleave", function(e) {
                icon.style = "";
            });
        });
    });
</script>

</html>