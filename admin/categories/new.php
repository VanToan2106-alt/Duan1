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
</head>
<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/categories.php";
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

        .tittle_listUsers h3 {
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            padding: 10 15px;
            color: black;
            font-weight: bold;
        }

        .button-add {
            padding: 10px 15px;
            border-radius: 10px;
            background-color: #F9D949;
            font-weight: bold;
            transition: 0.5s;
        }

        .button-list {
            padding: 7px 15px;
            background-color: #F0F0F0;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            color: black;
        }

        .button-add:hover {
            filter: brightness(0.8);
        }

        .button-list:hover {
            filter: brightness(0.8);

        }
    </style>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <div class="menu-info">
                </div>

                <div class="manage-categories">
                    <div class="tittle_listUsers">

                        <h3>Quản lý loại hàng</h3>
                    </div>
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label>Mã loại</label>
                            <input style="background-color: #aaabb2; border:none;" name="id_category" value="auto number" class="form-control" readonly>
                        </div>

                        <div class="form-group">
                            <label>Tên loại</label>
                            <input required name="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" name="btn_insert" class="button-add">Thêm mới </button>
                            <a href="list.php?btn_list" class="button-list" id="btn-cate">Danh sách</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
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
</script>

</html>