<div style="background-color: #F0F0F0;" class="tittle_customer">
    <h3 style="color: black">Danh sách tài khoản khách hàng</h3>
    <i style="color:black" class="fa-solid fa-users"></i>
</div>
<?php
$getCustomers = getAll_customers()
?>
<div class="table_main">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Ngày khởi tạo</th>
                <th>Tùy chọn</th>
            </tr>

        </thead>
        <link rel="stylesheet" href="./">
        <tbody>
            <?php
            $i = 0;
            foreach ($getCustomers as $get) {
            ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= $get['email'] ?></td>
                <td><?= $get['day_registered'] ?></td>
                <td>
                    <a style="background-color: #F9D949; color:black; font-weight:bold; border:none"
                        class="btn btn-primary" href="./index.php?customers_edit=<?= $get['id_user'] ?>">Xem chi
                        tiết</a>
                </td>
            </tr>
            <?php


            }
            ?>
        </tbody>
    </table>
</div>