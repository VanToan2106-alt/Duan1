<div style="background-color: #F0F0F0;" class="tittle_admin">
    <h3 style="color: black;">Danh sách tài khoản admin</h3>
    <i style="color: black" class="fa-sharp fa-solid fa-user-secret"></i>
</div>
<?php
$getAdmins = getAll_Admin()
?>
<div class="table_">
    <table>
        <thead>
            <tr>
                <th>STT</th>
                <th>Email</th>
                <th>Ngày khởi tạo</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($getAdmins as $get) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $get['email'] ?></td>
                    <td><?= $get['day_registered'] ?></td>
                </tr>
            <?php


            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .tittle_admin {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #596ad2;
        margin: 20px auto;
        width: 50%;
        border-radius: 20px;
    }

    .tittle_admin h3 {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        padding: 10px 15px;
        color: white;
        font-weight: bold;
    }

    .tittle_admin i {
        font-size: 30px;
        color: white;
        margin-left: 30px;
    }

    table {
        margin-top: 50px;
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        border: 1px solid #ddd;
        color: white;
        display: block;
        max-height: 600px;
        overflow-y: scroll;
        font-size: 20px;
    }

    tr {
        border-bottom: 1px solid white;
    }

    table thead tr,
    table tbody tr {
        display: table;
        width: 100%;
        table-layout: fixed;
    }

    th,
    td {
        text-align: center;
        padding: 20px 0px;
    }
</style>