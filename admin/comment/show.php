<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/reset.css" />
    <link rel="stylesheet" href="../../css/admin/cmt/style.css" />
    <!-- FONT AWSOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
    body {
        background-color: #1A1E37;
    }
</style>
<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/comments.php";
$product =  comments_product($_GET['id_product']);

?>

<body>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 0px solid #ddd;
            /* border: none; */
            color: white;
            display: block;
            max-height: 600px;
            overflow-y: scroll;
            font-size: 16px;
            margin-top: 10px;
            text-align: center;
        }



        tbody {
            /* background-color: white; */
            color: white;
            line-height: 30px;


        }

        tr {
            border-bottom: 1px solid white;
        }



        thead th {
            background-color: #f0f0f0;
            color: black;
            font-weight: bold;
        }

        table thead tr,
        table tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        .tittle_cmt {
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #F0F0F0;
            margin: 20px auto;
            width: 50%;
            border-radius: 20px;
        }

        .tittle_cmt h3 {
            color: black;
            font-weight: bold;
        }
    </style>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <div class="manage-categories">
                    <div class="tittle_cmt">

                        <h3>Thống Kê Bình Luận</h3>
                    </div>
                    <table>

                        <form action="index.php" method="post">
                            <table class="categories-table-list">

                                </h1>
                                <thead>
                                    <tr>
                                        <th>Nội Dung Bình Luận </th>
                                        <th>Ngày Bình Luận</th>
                                        <th>Người Bình Luận</th>
                                    </tr>
                                </thead>
                                <tbody style="background-color: #1A1E37;">
                                    <?php
                                    foreach ($product as $item) {
                                    ?>

                                        <tr>

                                            <td><?= $item["content"] ?></td>
                                            <td><?= $item["updated_at"] ?></td>
                                            <td><?= $item["email"] ?></td>



                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>

                                    </tr>
                                </tfoot>
                            </table>
                        </form>

                    </table>

                </div>
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