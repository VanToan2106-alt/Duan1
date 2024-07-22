<?php
extract($_REQUEST);
$getId = users_select_by_id($staff_edit);
// extract($getId);
// echo $getId['id_user'];

?>
<form action="../account/index.php" method="POST">
    <div class="form-id">
        <label for="">Mã nhân viên</label> <br>
        <input name="id_user" style="background-color: darkgray;" value="<?= $getId['id_user'] ?>" type="text" readonly>
    </div>


    <div class="form-email">
        <label for="">Email</label> <br>
        <input name="email" value="<?= $getId['email'] ?>" type="email">
    </div>

    <div class="form-group">
        <label>Vai trò</label>
    </div>
    <div class="form-role">
        <input class="form-check-input" type="radio" value="1" name="role" id="khachhang" <?= $getId['role'] == 1 ? "checked" : "" ?>>
        <label class="form-check-label label-staff" style="font-weight: normal;" for="khachhang">
            Nhân viên
        </label>
    </div>
    <div class="form-role">
        <input class="form-check-input" type="radio" value="2" name="role" id="nhanvien" <?= $getId['role'] == 2 ? "checked" : "" ?>>
        <label class="form-check-label label-admin" style="font-weight: normal;" for="nhanvien">
            Admin
        </label>
    </div>

    <input name="password" value="<?= $getId['password'] ?>" type="hidden">

    <div>
        <input style="width: 10%" type="submit" class="btn btn-success btn-update" name="btn-update" value="Cập nhật">
        <input style="width: 10%" type="reset" class="btn btn-warning" value="Nhập lại">
        <a href="../account/index.php?staff" style="margin-top: 20px" class="btn btn-info">
            DANH SÁCH
        </a>
    </div>

</form>


<style>
    form {
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        /* align-items: center; */
    }

    label {
        font-weight: bold;
        color: white;

    }

    form div {
        padding: 10px 15px;
        /* width: 100%; */
    }

    input {
        background-color: white;
        border: white;
        padding: 10px 15px;
        width: 80%;
        margin-top: 20px;
        border-radius: 10px;
    }

    .check-input {
        width: 1%;
        height: 20px;
    }

    .form-role {
        display: flex;
        align-items: center;
    }

    .form-role label {
        margin-left: 10px;
    }

    .label-staff {
        color: #d0aa61;

    }