<?php
if (isset($_GET['edit-user'])) {
?>
    <h3 class="text_changePass">Chỉnh sửa email</h3>
    <form method="post" class="form_update">
        <div class="email_success">
            <label for="">Email tài khoản</label> <br />
            <input name="email" type="email" value="<?= $user['email'] ?>" required />
        </div>
        <div class="email_success">
            <input name="update_user" type="submit" value="Cập nhật">
        </div>
    </form>
<?php
}
?>

<?php
if (isset($_GET['edit-customer'])) {
?>
    <h3 class="text_changePass">Địa chỉ</h3>
    <form method="post" class="form_update">
        <div class="email_success">
            <label for="">Tên:</label> <br />
            <input name="full_name" type="text" required value="<?= $info_customer['full_name'] ?>" />
        </div>
        <div class="email_success">
            <label for="">SĐT:</label> <br />
            <input name="phone" type="text" required value="<?= $info_customer['phone'] ?>" />
        </div>
        <div class="email_success">
            <label for="">Địa chỉ:</label> <br />
            <input name="address" type="text" required value="<?= $info_customer['address'] ?>" />
        </div>
        <div class="email_success">
            <label for="">Ghi chú:</label> <br />
            <input name="note" type="text" value="<?= $info_customer['note'] ?>" />
        </div>
        <div class="email_success">
            <input name="update_customer" type="submit" value="Cập nhật">
        </div>
    </form>
<?php
}
?>
<?php
if (isset($_GET['add-customer'])) {
?>
    <h3 class="text_changePass">Thêm địa chỉ</h3>
    <form method="post" class="form_update">
        <div class="email_success">
            <label for="">Tên:</label> <br />
            <input name="full_name" type="text" required />
        </div>
        <div class="email_success">
            <label for="">SĐT:</label> <br />
            <input name="phone" type="text" required />
        </div>
        <div class="email_success">
            <label for="">Địa chỉ:</label> <br />
            <input name="address" type="text" required />
        </div>
        <div class="email_success">
            <label for="">Ghi chú:</label> <br />
            <input name="note" type="text" />
        </div>
        <div class="email_success">
            <input name="add_customer" type="submit" value="Thêm địa chỉ">
        </div>
    </form>
<?php
}
?>
<!-- <p style="margin-left: 10%; color: green;">Thêm địa chỉ</p> -->

<?php
if (isset($_POST['update_user']) && $_POST['update_user']) {
    try {
        user_update_private($_SESSION['user']['id_user'], $_POST['email']);
        $_SESSION['user']['email'] =  $_POST['email'];
        echo "<h4 style='margin-left: 10%;color: green;'>Cập nhật thành công!</h4>";
        echo "<script language='javascript'>
        setTimeout(function() {
            window.location.href = '" . $ROOT_URL . "/users-manage/index.php';
             }, 1000);
        </script>";
    } catch (Exception $exc) {
        echo "<h4 style='margin-left: 10%;color: red;'>Cập nhật thất bại!</h4>";
    }
}
if (isset($_POST['update_customer']) && $_POST['update_customer']) {
    try {
        customers_update($_GET['edit-customer'], $_SESSION['user']['id_user'], $_POST['full_name'], $_POST['phone'], $_POST['address'], $_POST['note']);
        echo "<h4 style='margin-left: 10%;color: green;'>Cập nhật thành công!</h4>";
        echo "<script language='javascript'>
        setTimeout(function() {
            window.location.href = '" . $ROOT_URL . "/users-manage/index.php';
             }, 1000);
        </script>";
    } catch (Exception $exc) {
        echo "<h4 style='margin-left: 10%;color: red;'>Cập nhật thất bại!</h4>";
    }
}
if (isset($_POST['add_customer']) && $_POST['add_customer']) {
    try {
        customers_insert($_SESSION['user']['id_user'], $_POST['full_name'], $_POST['phone'], $_POST['address'], $_POST['note']);
        echo "<h4 style='margin-left: 10%;color: green;'>Thêm mới thành công!</h4>";
        echo "<script language='javascript'>
        setTimeout(function() {
            window.location.href = '" . $ROOT_URL . "/users-manage/index.php';
             }, 1000);
        </script>";
    } catch (Exception $exc) {
        echo "<h4 style='margin-left: 10%;color: red;'>Thêm mới thất bại!</h4>";
    }
}
?>