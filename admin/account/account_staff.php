<div style="background-color: #F0F0F0;" class="tittle_staffs">
    <h3 style="color: black;">Danh sách tài khoản nhân viên</h3>
    <i style="color: black;" class="fa-solid fa-users fa-solid fa-user-tie"></i>
</div>
<?php
$getStaffs = getAll_staff();
?>
<div class="box-btn">
    <a class="btn-insert" href="./index.php?staff_add">

        <i class="fa fa-plus icon_plus"></i>

    </a>
</div>
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
        <tbody>
            <?php
            $i = 0;
            foreach ($getStaffs as $get) {
            ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $get['email'] ?></td>
                    <td><?= $get['day_registered'] ?></td>
                    <td>
                        <a class="btn-edit" href="./index.php?staff_edit=<?= $get['id_user'] ?>">Chỉnh
                            sửa</a>

                        <a class="btn-delete" href="./index.php?staff_delete=<?= $get['id_user'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php


            }
            ?>
        </tbody>
    </table>

</div>
<style>
    .box-btn {
        float: right;
        margin-right: 30px;
        margin-bottom: 30px;
    }

    .box-btn:hover {
        filter: brightness(1.5);
    }

    .box-btn .btn-insert::before {
        content: "Click vào để thêm mới";
        display: none;
        position: absolute;
        background: white;
        color: black;
        font-weight: bold;
        padding: 5px;
        top: 100%;
        /* left: -150%; */
        right: 50%;
        white-space: nowrap;
    }

    .box-btn .btn-insert:hover::before {
        display: block;
    }

    .icon_plus {
        color: white;
    }

    .btn-insert {
        border-radius: 15px;
        background-color: #596ad2;
        padding: 10px 15px;
        color: white;
    }

    .btn-insert:hover {
        cursor: pointer;
    }

    .btn-edit {
        background-color: #F9D949;
        padding: 5px 10px;
        color: black;
        border-radius: 10px;
        transition: 0.5s;
    }

    .btn-delete {
        background-color: #F45050;
        padding: 5px 10px;
        color: black;
        border-radius: 10px;
    }

    .btn-edit:hover {
        /* color: white; */
        filter: brightness(1.5)
    }

    .btn-delete:hover {
        /* color: white; */
        filter: brightness(1.5)
    }
</style>