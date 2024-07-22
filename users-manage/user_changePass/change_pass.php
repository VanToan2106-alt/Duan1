<h3 class="text_changePass">Đổi mật khẩu</h3>
<form class="form_update" method="post">
    <div class="passwordOld_success">
        <label for="">Nhập mật khẩu cũ</label> <br />
        <input type="password" name="old_pass" placeholder="Enter your old Password" />
    </div>
    <div class="passwordNew_success">
        <label for="">Nhập mật khẩu mới</label> <br />
        <input type="password" name="new_pass" placeholder="Enter your new Password" />
    </div>
    <div class="password_confirm">
        <label for="">Xác nhận mật khẩu</label> <br />
        <input type="password" name="check_pass" placeholder="Enter your Password" />
    </div>

    <div class="button_update">
        <input type="submit" name="update_pass" value="Cập nhật mật khẩu" />
    </div>
</form>
<?php
if (isset($_POST['update_pass']) && $_POST['update_pass']) {
    if ($_POST['new_pass'] == $_POST['check_pass']) {
        $check = users_exist($_SESSION['user']['email'], $_POST['old_pass']);
        if (is_string($check)) {
            echo "<h4 style='margin-left: 10%;color: red;'>" . $check . "</h4>";
        } else {
            try {
                users_change_password($_SESSION['user']['id_user'], $_SESSION['user']['email'], $_POST['new_pass']);
                echo "<h4 style='margin-left: 10%;color: green;'>Cập nhật thành công!</h4>";
                // echo "<script language='javascript'>
                //         setTimeout(function() {
                //             window.location.href = '/myPHP/laptop-store/our-laptop-store/users-manage/index.php';
                //              }, 1000);
                //         </script>";
            } catch (Exception $exc) {
                echo "<h4 style='margin-left: 10%;color: red;'>Cập nhật thất bại!</h4>";
            }
        }
    } else {
        echo "<h4 style='margin-left: 10%;color: red;'>Mật khẩu không trùng khớp!</h4>";
    }
}
?>