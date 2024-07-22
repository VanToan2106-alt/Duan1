<?php
// extract($_REQUEST);
$get_bills = get_bills_status($_GET['status']);

?>
<div style="background-color: #F0F0F0;" class="tittle_customer">
    <h3 style="color: black">Danh sách <?= $arrStatus[$_GET['status']] ?></h3>
    <i style="color: black;" class="fa-solid fa-users"></i>
</div>
<div class="table_main">
    <table class="bills">
        <thead>
            <tr>
                <th>ID Bill</th>
                <th>Tên người nhận</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ </th>
                <th>Ngày mua</th>
                <th style="width: 350px;">Trạng thái</th>
                <th>Tùy chọn</th>
            </tr>

        </thead>
        <tbody>
            <?php
            $i = 0;
            foreach ($get_bills as $key => $get) {
            ?>
                <tr>
                    <td><?= $get['id_bill'] ?></td>
                    <td><?= $get['receiver_name'] ?></td>
                    <td><?= $get['receiver_phone'] ?></td>
                    <td><?= $get['receiver_address'] ?></td>
                    <td class="bill_time"><?= $get['purchase_date'] ?></td>
                    <!-- <td><a href="./index.php?approveid=<?= $get['id_bill'] ?>&change=">Thông tin chi tiết</a></td> -->
                    <td class="setting_bill">
                        <select id="approveid" onchange="location = this.value;">
                            <option class="option_select" value="<?= $ROOT_URL ?>/admin/bills/index.php?approveid=<?= $get['id_bill'] ?>&change=<?= $_GET['status'] ?>" selected>
                                <?= $arrStatus[$_GET['status']];
                                ?>
                            </option>
                            <?php
                            if ($_GET['status']!=count($arrStatus)-1) {
                                # code...
                           
                            foreach ($arrStatus as $key => $status) {
                                if ($key != $_GET['status']) {
                                    echo $key;
                            ?>
                                    <option class="option_select" value="<?= $ROOT_URL ?>/admin/bills/index.php?approveid=<?= $get['id_bill'] ?>&change=<?= $key ?>">
                                        <?= $status;   ?>
                                    </option>
                            <?php
                                } }
                            }

                            ?>
                        </select>

                    </td>
                    <td> <a class="btn_view" href="<?= $ROOT_URL ?>/admin/bills/detailbill.php?approveid=<?= $get['id_bill'] ?>">Xem chi
                            tiết</a></td>

                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    function handleSelect(elm) {
        console.log(document.getElementById('approveid').value);
        // window.location.href = document.getElementById('approveid').value;
    }
</script>
<style>
    table {
        text-align: center;
    }

    a {
        color: white;
    }

    a:hover {
        color: black;
    }

    .setting_bill {
        margin-top: 10px;
        border: none;
        width: 350px;

    }

    #approveid {
        width: 100%;
        height: 60px;
        background-color: white;
        text-align: center;
        font-size: 20px;
    }


    .option_select {
        color: red;

    }


    .bills {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .bills td,
    .bills th {
        border: 1px solid white;
        padding: 8px;
        outline: none;
    }



    .bills th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #F9D949;
        color: black;
        font-weight: bold;
    }

    .bills tr {
        font-size: 16px;
        line-height: 30px;
        width: 100%;
    }

    .btn_view {
        padding: 10px 15px;
        background-color: #de4a3e;
        color: white;
        transition: 0.5s;
        border-radius: 15px;
        font-weight: bold;
    }
</style>