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
        .manage-cate-title {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F0F0F0;
            margin: 10px auto;
            width: 50%;
            border-radius: 20px;
            font-weight: bold;
        }

        .update_btn {
            padding: 10px 15px;
            background-color: #4477CE;

            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            color: black;
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

        .button-retype {
            padding: 10px 15px;
            background-color: #F0F0F0;
            border-radius: 10px;
            font-weight: bold;
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<?php
include "../../global.php";
include "../../dao/products.php";
include "../../dao/categories.php";
include "../../dao/pdo.php";
$item = get_info_product($_GET["id_product"]);

?>

<body>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">

                <div class="manage-categories">
                    <div class="manage-cate-title">
                        <h2>Quản lí loại hàng</h2>
                    </div>
                    <form action="index.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Mã sản phẩm</label>
                            <input name="id_product" value="<?= $item["id_product"] ?>" class="form-control" readonly>
                        </div>



                        <div class="form-group">
                            <label>Tên Hãng</label>
                            <?php
                            $idcategory = $item['id_category'];
                            if (isset($_GET['id-category'])) {
                                $idcategory = $_GET['id-category'];
                            }

                            $firmsProduct = get_product_name_firms_category($idcategory);
                            ?>

                            <select name="firms" class="form-control">

                                <div class="form-group">
                                    <label>Tên hãng</label>

                                    <?php

                                    foreach ($firmsProduct as $firms) {
                                        echo '<option value="' . $firms . '">' . $firms . '</option>';
                                    };
                                    ?>

                                </div>
                            </select>


                        </div>
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input name="name" value="<?= $item["name"] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Giá</label>
                            <input name="price" type="number" value="<?= $item["price"] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Giảm giá</label>
                            <input name="discount" type="number" value="<?= $item["discount"] ?>" min="0" max="100" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Hình</label>
                            <!-- <input name="img_product" type="file" class="form-control"> -->
                            <input name="img_product" type="file" value="<?= $item["img_product"] ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control" rows="5"><?= $item["description"] ?></textarea>
                        </div>

                        <div class="form-group">
                            <button name="btn_update" class="update_btn">Cập nhật</button>
                            <button name="btn_insert" class="button-add">Thêm mới</button>
                            <button type="reset" class="button-retype">Nhập lại</button>
                            <a href="list.php?btn_list" class="button-list" id="btn-form-plus">Danh sách</a>
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