<?php
// extract($_REQUEST);
// $getId = users_select_by_id($customers_edit);

$customer_data = get_user_customers_bill($_GET['customers_edit']);

?>
<style>
strong {
    color: black;
}

.box_customer {
    width: 50%;
    height: 50%;
    /* margin: 20px 0px; */
    height: 180px;
    border: 1px solid #999999;
    background-color: white;
    border-radius: 20px;
    margin-left: 20px;
}

.box_customer p {
    margin-top: 10px;
    padding: 0px 10px;
    color: black;
    word-wrap: break-word;
}

.main_box {
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
<div class="tittle_listUsers" style="background-color: #F0F0F0;">

    <h3 style="color: black;">Thông tin khách hàng</h3>
</div>
<div class="main_box">

    <?php
    if (empty($customer_data)) {
    ?>
    <div style="background-color: #aaabb2 " class="box_customer">
        <p><strong>ID Customer: </strong>#####</p>
        <p><strong>Tên khách hàng: </strong>#####</p>
        <p><strong>Số điện thoại: </strong>#####</p>
        <p><strong>Địa chỉ:</strong>#####</p>
        <p><strong>Ghi chú: </strong>#####</p>
    </div>
    <?php
    }
    foreach ($customer_data as $export_customer) {
    ?>
    <div style="background-color: #F9D949; border:none" class="box_customer">
        <p><strong>ID Customer: </strong><?= $export_customer['id_customer'] ?></p>
        <p><strong>Tên khách hàng: </strong><?= $export_customer['full_name'] ?></p>
        <p><strong>Số điện thoại: </strong><?= $export_customer['phone'] ?></p>
        <p><strong>Địa chỉ:</strong><?= $export_customer['address'] ?></p>
        <p><strong>Ghi chú: </strong><?= $export_customer['note'] ?></p>
    </div>
    <?php
    }
    ?>
</div>