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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<style>
.table {
    padding: 10px;
    margin-top: 5px;

}


a {
    text-decoration: none;
}

.show a:hover {
    text-decoration: underline;
    color: #9E86FE;
    transform: scalex(1.2);
}

.show {
    text-align: center;
    border: none;
    border-radius: 8px;
    transition: all 0.2s ease-in-out;
    text-decoration: none;

}

h1 a {
    text-decoration: none;
    color: red;
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

.main-lowkey {
    margin-top: -10px;
    padding: 10px;
}

table {
    border-collapse: collapse;
    width: 100%;
    border: 0px solid #ddd;
    /* border: none; */
    color: white;
    display: block;
    max-height: 600px;
    overflow-y: scroll;
    font-size: 18px;
    margin-top: -10px;
    text-align: center;
}



tbody {
    background-color: #1a1e37;
    color: white;


}

tr {
    border-bottom: 1px solid white;
}

thead th {
    background-color: white;
}

table thead tr,
table tbody tr {
    display: table;
    width: 100%;
    table-layout: fixed;
}

.btn_show {
    background-color: #F9D949;
    padding: 5px 10px;
    color: black;
    border-radius: 10px;
    transition: 0.5s;
    text-decoration: none;
    font-weight: bold;
}

.btn_show a {
    color: black;
    font-weight: bold;
}

.btn_show a:hover {
    color: black;
    text-decoration: none;

}

.btn_show:hover {
    filter: brightness(0.8);
}
</style>
<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/comments.php";
include "../../dao/products.php";
$comments = get_all_comments();

?>

<body>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">
                <table>
                    <form action="index.php" method="post">
                        <div class="tittle_cmt">

                            <h3>Thống Kê Bình Luận</h3>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="background-color: #F0F0F0; font-weight:bold; font-size:16px;">Mã Sản Phẩm
                                    </th>
                                    <th style="background-color:  #F0F0F0; font-weight:bold; font-size:16px;">Tên Sản
                                        Phẩm
                                    </th>
                                    <th style="background-color: #F0F0F0; font-weight:bold; font-size:16px;">Số Lượng
                                        Bình
                                        Luận</th>
                                    <th style="background-color:  #F0F0F0; font-weight:bold; font-size:16px;">Chi Tiết
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($comments as $item) {
                                ?>
                                <tr>
                                    <td><?= $item["id_product"] ?></td>
                                    <td><?= $item["name"] ?></td>
                                    <td><?= $item["count"] ?></td>
                                    <td class="show">
                                        <button class="btn_show">
                                            <a href="show.php?&id_product=<?= $item['id_product'] ?>">Hiển Thị</a>
                                        </button>
                                    </td>
                                </tr>

                            </tbody>
                            <?php
                                }
                        ?>

                        </table>
                    </form>
                </table>

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