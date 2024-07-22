<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/reset.css" />
    <link rel="stylesheet" href="../../css/admin/categories/style.css" />
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        #btn-form-plus {
            color: #fff;
            border-color: #fff;
            background-color: #9d86ff;
            font-weight: bold;
        }
    </style>
</head>
<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/categories.php";
$category = get_all_categories();
?>

<body>
    <style>
        .tittle_listUsers {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F0F0F0;
            margin: -10px auto;
            width: 50%;
            border-radius: 20px;
            font-weight: bold;
        }

        .tittle_listUsers h2 {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            padding: 10 15px;
            color: black;
            font-weight: bold;
        }

        .manage-categories {
            margin-top: 30px;
        }

        .btn_clickAll {
            padding: 10px 15px;
            border-radius: 10px;
            background-color: #F0F0F0;

            font-weight: bold;
            transition: 0.5s;
        }

        .btn_dell {
            padding: 10px 15px;
            border-radius: 10px;
            background-color: #F0F0F0;

            font-weight: bold;
            transition: 0.5s;
        }

        .btn_dellAll {
            padding: 10px 15px;
            border-radius: 10px;
            background-color:
                #de4a3e;
            font-weight: bold;
            transition: 0.5s;
        }

        .btn_add {
            padding: 7px 15px;
            background-color: #F9D949;

            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            color: black;
        }

        button:hover {
            filter: brightness(0.8);
        }

        #edit-cate {
            color: black;
        }

        .btn_edit {
            background-color: #F9D949;
            padding: 5px 10px;
            color: black;
            border-radius: 10px;
            transition: 0.5s;
            text-decoration: none;
            font-weight: bold;
        }

        .btn_delete {
            background-color: #de4a3e;
            padding: 5px 10px;
            color: black;
            border-radius: 10px;
            transition: 0.5s;
            text-decoration: none;
            font-weight: bold;
        }

        .btn_edit:hover {
            filter: brightness(0.8);
        }

        .btn_delete:hover {
            filter: brightness(0.8);
        }

        .btn_add:hover {
            filter: brightness(0.8);
        }

        .delete_button {
            padding: 8px 10px;
        }

        th {
            /* background-color: #F0F0F0; */
            color: white;
            text-align: center;
        }
    </style>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <div class="manage-categories">
                    <div class="manage-cate-list">
                        <div class="tittle_listUsers">
                            <h2>Danh sách loại hàng</h2>
                        </div>
                        <hr class="new1">
                        <form action="index.php" method="post">
                            <table class="categories-table-list">
                                <tr>
                                    <th></th>
                                    <th>Mã loại</th>
                                    <th>Tên loại</th>
                                    <th>Chỉnh sửa</th>
                                </tr>

                                <?php
                                foreach ($category as $item) {
                                ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="id_category[]" value="<?= $item["id_category"] ?>">
                                        </td>
                                        <td><?= $item["id_category"] ?></td>
                                        <td><?= $item["name"] ?></td>
                                        <td>
                                            <a style="color:black;" href="./edit.php?edit=<?= $item["id_category"] ?>" name="btn_update" class="btn_edit" id="edit-cate">Sửa</a>
                                            <a class="btn_delete" style="color: black; background-color: #de4a3e" href="?delete_category=<?= $item['id_category'] ?>">Xóa</a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                if (isset($_GET['delete_category']) && $_GET['delete_category']) {
                                    categories_delete($_GET['delete_category']);
                                    echo "<script language='javascript'>
                                    window.location.href = '$ROOT_URL/admin/categories/list.php';
                                    </script>";
                                }
                                ?>
                            </table>
                    </div>

                    <div class="form-group">
                        <button id="check-all" type="button" class="btn_clickAll" onclick="CheckAll()">Chọn tất
                            cả</button>
                        <button id="clear-all" type="button" class="btn_dell" onclick="DeleteCheckAll()">Bỏ chọn
                            tất cả</button>
                        <button id="btn-delete" name="btn_delete" class="btn_dellAll">Xóa các mục
                            chọn</button>
                        <a href="new.php" class="btn_add">Nhập thêm</a>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <style>

    </style>
</body>

<script>
    window.addEventListener("load", function(e) {
        const lis = document.querySelectorAll("li");
        lis.forEach((item) => {
            const icon = item.querySelector(".icon_side");
            item.addEventListener("mouseenter", function(e) {
                icon.style.transition = "0.5s";
                icon.style.transform = "scale(2)";
            });
            item.addEventListener("mouseleave", function(e) {
                icon.style = "";
            });
        });
    });
    CheckAll = () => {
        var inputCheckBox = document.getElementsByName("id_category[]");
        inputCheckBox.forEach((e, i) => {
            e.checked = true;
        });
    }
    DeleteCheckAll = () => {
        var inputCheckBox = document.getElementsByName("id_category[]");
        inputCheckBox.forEach((e, i) => {
            e.checked = false;
        });
    }
    const btn_delete = document.querySelectorAll(".delete_button")
    btn_delete.forEach((item, index) => item.addEventListener("click"), function(e) {
        var inputCheckBox = document.getElementsByName("id_category[]");
        inputCheckBox[index].checked = true;
        console.log(inputCheckBox);
    })
</script>

</html>