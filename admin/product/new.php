<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/reset.css" />
    <link rel="stylesheet" href="../../css/admin/product/style.css" />
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/products.php";
include "../../dao/categories.php";

$categories = get_all_categories();
?>

<body>
    <style>
        .manage-cate-title {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 15px auto;
            width: 50%;
            border-radius: 20px;
            font-weight: bold;
            margin-bottom: -30px;
        }

        .btn_add {
            background-color: #F9D949;
            padding: 5px 10px;
            color: black;
            border-radius: 10px;
            transition: 0.5s;
            text-decoration: none;
            font-weight: bold;
        }

        .btn_rewrite {
            background-color: #f0f0f0;
            padding: 5px 10px;
            color: black;
            border-radius: 10px;
            transition: 0.5s;
            text-decoration: none;
            font-weight: bold;
        }

        .btn_list {
            background-color: #F0F0F0;
            padding: 5px 10px;
            color: black;
            border-radius: 10px;
            transition: 0.5s;
            text-decoration: none;
            font-weight: bold;
        }

        a {
            color: black;
            text-decoration: none;
        }

        button:hover {
            filter: brightness(0.8);
        }
    </style>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <div style="background-color: #F0F0F0;" class="manage-cate-title">
                    <h2 style="color: black; font-weight:bold">Quản lí sản phẩm</h2>
                </div>
                <div class="manage-categories">
                    <div class="wrap-background">

                        <form action="index.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input style="background-color: #aaabb2; border:none;" name="id_product" value="auto number" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label>Loại sản phẩm</label>
                                <input name="id_category" type="hidden" value="<?= $_GET['id-category'] ?>" class="form-control">

                                <select id="id_category" class="form-control" onchange="location = this.value;">

                                    <?php
                                    if (isset($_GET['id-category'])) {
                                        $_SESSION['id-category-handle'] = $_GET['id-category'];

                                    ?>
                                        <option value="<?= $ROOT_URL ?>/admin/product/new.php?id-category=<?= $_GET['id-category'] ?>">
                                            <?= $categories[$_GET['id-category'] - 1]["name"] ?> </option>
                                        <?php
                                    }
                                    foreach ($categories as $category) {
                                        if (isset($_GET['id-category'])) {
                                            if ($category["id_category"] != $_GET['id-category']) {
                                        ?>
                                                <option value="<?= $ROOT_URL ?>/admin/product/new.php?id-category=<?= $category["id_category"] ?>">
                                                    <?= $category["name"] ?> </option>
                                            <?php }
                                        } else { ?>
                                            <option value="<?= $ROOT_URL ?>/admin/product/new.php?id-category=<?= $category["id_category"] ?>">
                                                <?= $category["name"] ?> </option>
                                    <?php }
                                    } ?>
                                </select>
                            </div>



                            <div class="form-group">
                                <label>Tên hãng</label>

                                <?php
                                $idcategory = 1;
                                if (isset($_GET['id-category'])) {
                                    $idcategory = $_GET['id-category'];
                                }

                                $firmsProduct = get_product_name_firms_category($idcategory);

                                if ($firmsProduct != null) {
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
                                <?php
                                } else {
                                ?>
                                    <input name="firms" class="form-control">

                                <?php
                                } ?>
                                <div class="form-group">
                                    <label>Tên sản phẩm</label>
                                    <input name="name" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Giá</label>
                                    <input name="price" type="number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Giảm giá</label>
                                    <input name="discount" type="number" min="0" max="100" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>Hình</label>
                                    <input name="img_product" type="file" class="form-control">
                                    <!-- <input name="img_product" type="text" class="form-control"> -->
                                </div>

                                <div class="form-group">
                                    <label>Mô tả</label>
                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                </div>

                            </div>


                            <button name="btn_insert" class="btn_add">Thêm mới</button>
                            <button type="reset" class="btn_rewrite">Nhập lại</button>
                            <button class="btn_list">
                                <a href="list.php?btn_list">Danh sách</a>

                            </button>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <style>
            .manage-categories {
                margin-top: 40px;
            }
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
</script>

</html>