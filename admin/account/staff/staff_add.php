<?php
extract($_REQUEST);

?>
<form action="../account/index.php" method="POST">

    <div class="form-email">
        <label for="">Email nhân viên</label> <br>
        <input name="email" value="" type="email">
    </div>

    <div class="form-password">
        <label for="">Mật khẩu</label> <br>
        <input name="password" value="" type="password">
    </div>
    <div class="form-group">
        <label>Vai trò</label>
    </div>
    <div class="form-role">
        <input class="form-check-input check-input" type="radio" value="1" name="role" id="khachhang">
        <label class="form-check-label label-staff" style="font-weight: normal;" for="khachhang">
            Nhân viên
        </label>
    </div>
    <div class="form-role">
        <input class="form-check-input" type="radio" value="2" name="role" id="nhanvien">
        <label class="form-check-label label-admin" style="font-weight: normal;" for="nhanvien">
            Admin
        </label>
    </div>

    <div>
        <input style="width: 10%" type="submit" class="btn btn-success btn-update" name="btn-insert" value="Thêm">
        <input style="width: 10%" type="reset" class="btn btn-warning" value="Nhập lại">
        <a href="../account/index.php?staff" style="margin-top: 20px" class="btn btn-info">
            Danh sách
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

    .label-admin {
        color: red;
    }
</style>