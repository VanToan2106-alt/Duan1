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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    #btn-form-plus {
        color: #fff;
        border-color: #fff;
        background-color: #9d86ff;
        font-weight: bold;

    }

    table {
        font-size: 16px;
    }

    .categories-table-list th {
        background-color: #1a1e37;
        font-size: 16px;
        text-align: center;
    }

    .tittle_list {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #F0F0F0;
        margin: 20px auto;
        width: 50%;
        border-radius: 20px;
        margin-top: 5px;
        margin-bottom: -40px;
    }

    .button-box {
        margin-top: 10px;
    }

    .btn_clickAll {
        background-color: #F0F0F0;
        padding: 5px 10px;
        color: black;
        border-radius: 10px;
        transition: 0.5s;
        text-decoration: none;
        font-weight: bold;
    }

    .btn_del {
        background-color: #F45050;

        padding: 5px 10px;
        color: black;
        border-radius: 10px;
        transition: 0.5s;
        text-decoration: none;
        font-weight: bold;
    }

    .btn_delAll {
        background-color: #F0F0F0;

        padding: 5px 10px;
        color: black;
        border-radius: 10px;
        transition: 0.5s;
        text-decoration: none;
        font-weight: bold;
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

    .btn_add a {
        color: black;
        font-weight: bold;
        text-decoration: none;
    }

    button:hover {
        filter: brightness(0.8);
    }

    .inp_edit {
        background-color: #F9D949;
        padding: 5px 10px;
        color: black;
        border-radius: 10px;
        transition: 0.5s;
        text-decoration: none;
        font-weight: bold;
        transition: 0.5s;
    }

    .inp_edit:hover {
        filter: brightness(0.8);
    }

    .inp_delete {
        background-color: #de4a3e;
        padding: 5px 10px;
        color: black;
        border-radius: 10px;
        transition: 0.5s;
        text-decoration: none;
        font-weight: bold;
    }
    </style>
</head>

<?php
include "../../global.php";
include "../../dao/pdo.php";
include "../../dao/products.php";
$product = get_all_products();
?>

<body>
    <div class="container-plus">
        <div class="main">
            <?php
            include "../../admin/layouts/side-bar.php"
            ?>
            <div class="information-system">

                <div class="tittle_list">

                    <h2>Danh sách sản phẩm</h2>
                </div>
                <div class="manage-categories">
                    <div class="manage-cate-list">
                        <form action="#" method="post">
                            <table class="categories-table-list">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Mã sản phẩm</th>
                                        <th>Hãng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Giảm giá</th>
                                        <th>Hình ảnh</th>
                                        <th>Chỉnh sửa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($product as $item) {
                                    ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="id_product[]"
                                                value="<?= $item["id_product"] ?>">

                                        </td>
                                        <td><?= $item["id_product"] ?></td>
                                        <td><?= $item["firms"] ?></td>
                                        <td><?= $item["name"] ?></td>
                                        <td><?= $item["price"] ?></td>
                                        <td><?= $item["discount"] ?></td>
                                        <td><img src="<?= $IMG_URL . '/shop/' . $item["img_product"] ?>" height="50px"
                                                alt="<?= $item["name"] ?>" /></td>
                                        <input type="text" name="id_product" value="<?= $item["id_product"] ?>" hidden>
                                        <td>
                                            <a href="edit.php?id_product=<?= $item["id_product"] ?>" name="btn_update"
                                                class="inp_edit">Sửa</a>
                                            <button id="btn-delete" name="btn_delete"><a class="inp_delete"
                                                    href="?btn_list&delete_product=<?= $item['id_product'] ?>">Xóa</a></button>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    if (isset($_GET['delete_product']) && $_GET['delete_product']) {
                                        product_delete($_GET['delete_product']);
                                        echo "<script language='javascript'>
                                    window.location.href = '$ROOT_URL/admin/product/list.php?btn_list';
                                    </script>";
                                    }
                                    ?>

                                </tbody>


                            </table>
                            <div class="button-box">
                                <button id="check-all" type="button" class="btn_clickAll" onclick="CheckAll()">Chọn tất
                                    cả</button>
                                <button id="clear-all" type="button" class="btn_delAll" onclick="ClearAll()">Bỏ chọn
                                    tất
                                    cả</button>
                                <button id="btn-delete" name="btn_delete" class="btn_del">Xóa các mục chọn</button>
                                <button class="btn_add">
                                    <a href="new.php">Nhập thêm</a>
                                </button>
                            </div>
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
CheckAll = () => {
    var inputCheckBox = document.getElementsByName("id_product[]");
    inputCheckBox.forEach((e, i) => {
        e.checked = true;
    });
}
ClearAll = () => {
    var inputCheckBox = document.getElementsByName("id_product[]");
    inputCheckBox.forEach((e, i) => {
        e.checked = false;
    });
}
</script>
<?php
// $image = "";
// if (isset($_FILES['img'])) {
//     $errors = array();
//     $file_name = $_FILES['img']['name'];
//     $file_size = $_FILES['img']['size'];
//     $file_tmp = $_FILES['img']['tmp_name'];
//     $file_type = $_FILES['img']['type'];
//     // $file_ext = strtolower(end(explode('.', $_FILES['img']['name'])));

//     $extensions = array("jpeg", "jpg", "png");

//     // if (in_array($file_ext, $extensions) === false) {
//     //   $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
//     // }

//     // if ($file_size > 2097152) {
//     //   $errors[] = 'File size must be exactly 2 MB';
//     // }

//     if (empty($errors) == true) {
//         // Upload the file to a directory on the server
//         $upload_dir = "uploads/";
//         $file_path = $upload_dir . $file_name;
//         move_uploaded_file($file_tmp, $file_path);
//         $image = $file_name;
//     }
// }
?>

</html>