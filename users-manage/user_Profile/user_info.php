<h3 class="text_changePass">Hồ sơ của tôi</h3>
<style>
body {
    background-color: white;
}

.form_update input {
    /* border: 1px solid #999999; */
    /* background-color: #cccccc; */
}

.list_customer {
    margin: 0px auto;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    width: 80%;
    height: 380px;
    max-height: 380px;
    overflow-y: scroll;
}

.box_customer {
    width: 45%;
    margin: 20px 0px;
    padding: 20px 30px;
    height: 180px;
    border: 1px solid black;
    background-color: white;
    border-radius: 20px;
    box-shadow: rgba(0, 0, 0, 0.75) 0px 1px 4px;
}

.box_customer p {
    color: black;
    word-wrap: break-word;
}
</style>

<div class="form_update">
    <div class="email_success">
        <label for="">Email tài khoản</label> <br />
        <input type="email" value="<?= $user['email'] ?>" readonly />
    </div>
    <div class="day_registered">
        <label for="">Ngày tham gia OCTOTECH</label>
        <input type="text" value="<?= $user['day_registered'] ?>" readonly />
    </div>
    <div style="margin-left: 10%;">
        <a href="?add-customer"><button class="btn btn-info">Thêm thông tin địa chỉ</button></a>
    </div>
</div>
<h3 class="text_changePass">Địa chỉ</h3>
<div class="list_customer">
    <?php
    foreach ($list_adress as $key => $customer) {
    ?>
    <div class="box_customer">
        <p><b>Ghi chú:</b> <?php if ($customer['note'] != '') {
                                    echo $customer['note'];
                                } else echo "Không" ?></p>
        <p><b>Tên:</b> <?= $customer['full_name'] ?></p>
        <p><b>SĐT:</b> <?= $customer['phone'] ?></p>
        <p><b>Địa chỉ:</b> <?= $customer['address'] ?></p>
        <p><a href="?edit-customer=<?= $customer['id_customer'] ?>">Chỉnh sửa</a> </p>
    </div>
    <?php
    }
    ?>
</div>
<div style="margin-left: 10%;">
    <a href="?add-customer"><button class="btn btn-info">Thêm địa chỉ</button></a>
</div>