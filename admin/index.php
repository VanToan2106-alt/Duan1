<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/admin/main/style.css" />
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<?php
include "../global.php";
include "../dao/pdo.php";
check_login();
include "../dao/bills.php";
include "../dao/users.php";
include "../dao/categories.php";
include "../dao/products.php";
include "../dao/comments.php";
$count_bills = count_all_bills();
$count_users = count_all_users();
$count_categories = count_all_categories();
$count_product = count_all_product();
$count_comments = count_all_comments();
?>

<body>
    <style>
    .menu-info {
        display: flex;
        justify-content: space-between;
        padding: 20px;
        /* align-items: center; */
    }

    .admin {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #596ad2;
        margin: 5px auto;
        width: 50%;
        border-radius: 20px;
        margin-top: 10px;
    }

    h1 {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        padding: 10 15px;
        color: white;
        font-weight: bold;
    }

    .statiscal {
        display: grid;
        grid-template-columns: 35% 35% 30%;

        margin-left: 120px;
        /* margin: 0 auto; */
    }


    .box {
        margin-top: 20px;
        width: 70%;

    }
    </style>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <div class="menu-info">
                    <div class="admin">
                        <h1>Hi BOSS</h1>
                    </div>
                </div>

                <div class="statiscal">
                    <div class="box">
                        <div class="box-info">
                            <p class="text-number"><?= $count_bills['count_all_bills'] ?></p>
                            <p>Đơn hàng</p>
                        </div>
                        <div class="box-img">
                            <i class="fa-solid fa-list"></i>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-info">
                            <p class="text-number"><?= $count_categories['count_all_categories'] ?></p>
                            <p>Loại hàng</p>
                        </div>
                        <div class="box-img">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-info">
                            <p class="text-number"><?= $count_product['count_all_products']  ?></p>
                            <p>Sản phẩm</p>
                        </div>
                        <div class="box-img">
                            <i class="fa-solid fa-users"></i>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-info">
                            <p class="text-number"><?= $count_users['count_all_users'] ?></p>
                            <p>Tài khoản</p>
                        </div>
                        <div class="box-img">
                            <i class="fa-solid fa-list"></i>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-info">
                            <p class="text-number"><?= $count_comments['count_all_commments'] ?></p>
                            <p>Bình luận</p>
                        </div>
                        <div class="box-img">
                            <i class="fa-sharp fa-solid fa-box"></i>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

</body>
<!-- <script>
    window.addEventListener("load", function (e) {
      const lis = document.querySelectorAll("li");
      lis.forEach((item) => {
        const icon = item.querySelector(".icon_side");
        item.addEventListener("mouseenter", function (e) {
          icon.style.transition = "0.5s";
          icon.style.transform = "scale(2)";
        });
        item.addEventListener("mouseleave", function (e) {
          icon.style = "";
        });
      });
    });
  </script> -->

</html>