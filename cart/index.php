<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/home/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="../css/popup/excute.css">
    <link rel="stylesheet" href="../css/shop/index.css" />
    <link rel="stylesheet" href="../css/cart/index.css" />

    <!-- ICON LINK -->
    <link rel="icon" href="../image/home/logo-nav.png" type="image/x-icon" />
    <!-- FONT POPPINS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />

    <!-- FONT ROBOTO -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />

    <!-- FONT NUNITO -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@800&display=swap" rel="stylesheet" />
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        window.addEventListener("load", function(e) {
            AOS.init({
                once: false,
            });
            const logo = document.querySelector(".logo_img");
            // logo.addEventListener("mouseover", function (e) {
            //   logo.style.transform = "rotate(360deg)";
            //   logo.style.transition = "all 5s ";
            // });
            logo.addEventListener("mouseleave", function(e) {
                logo.style.transform = "rotate(0deg)";
                logo.style.transition = "all 1s";
            });
        });
    </script>
    <?php
    include('../global.php');
    include('../dao/pdo.php');
    include('../dao/products.php');
    include('../dao/categories.php');
    include('../dao/rates.php');
    include('../dao/comments.php');
    include('../dao/carts.php');
    include('../dao/bills.php');
    include('../dao/customers.php');
    include('../dao/detail_bills.php');
    $CART_URL = $ROOT_URL . '/cart/index.php';
    if (!isset($_SESSION['user']) && isset($_SESSION['customer_order'])) {
        ob_start();
        $id_customer_order = (string)$_SESSION['customer_order']['id_customer'];
        $expiration_time = time() + (30 * 24 * 60 * 60);
        setcookie('id_customer_order', $id_customer_order, $expiration_time, '/');
        ob_end_flush();
    }
    ?>
</head>

<style>
    .handle_box_cart {
        flex-grow: 1;
    }

    .box_show_cart {
        min-height: 400px;
        max-height: 400px;
        overflow: hidden;
        overflow-y: scroll;
    }
</style>

<body>
    <div class="container-plus d-flex flex-column h-100">
        <!-- Header -->
        <?php
        include("$LAYOUT_URL/header.php");
        ?>
        <div class="handle_box_cart">
            <?php
            if (isset($_GET['bill'])) {
                if (isset($_GET['id-customer'])) {
                    $_SESSION['customer_order']['id_customer'] = $_GET['id-customer'];
                }
                include('./bill.php');
            } elseif (isset($_GET['subtract'])) {
                try {
                    $index = check_cart($_GET['product_edit']);
                    cart_update($index, -1);
                } catch (Exception $exc) {
                    $mess = $exc;
                } finally {
                    echo "<script language='javascript'>
                  window.location.href = '" . $CART_URL . "';
                  </script>";
                }
                $productCart = show_cart();

                include('./cart.php');
            } elseif (isset($_GET['delete-product-cart']) && $_GET['delete-product-cart']) {
                try {
                    cart_delete($_GET['id-cart-user']);
                } catch (Exception $exc) {
                    $mess = $exc;
                } finally {
                    echo "<script language='javascript'>
                  window.location.href = '" . $CART_URL . "';
                  </script>";
                }
                $productCart = show_cart();

                include('./cart.php');
            } elseif (isset($_GET['add'])) {
                try {
                    $index = check_cart($_GET['product_edit']);
                    cart_update($index, 1);
                } catch (Exception $exc) {
                    $mess = $exc;
                } finally {
                    echo "<script language='javascript'>
                  window.location.href = '" . $CART_URL . "';
                  </script>";
                }
                $productCart = show_cart();

                include('./cart.php');
            } elseif (isset($_GET['order'])) {
                if (isset($_SESSION['listPayment'])) {
                    try {
                        $id_customer_cookie = $_COOKIE["id_customer_order"] ?? '';
                        if (isset($_SESSION['customer_order'])) {
                            $id_customer = $_SESSION['customer_order']['id_customer'];
                        } elseif ($id_customer_cookie != '' && !isset($_SESSION['user'])) {
                            $id_customer = $id_customer_cookie;
                        } else {
                            $id_user = null;
                            if (isset($_SESSION['user'])) {
                                $id_user = $_SESSION['user']['id_user'];
                            }
                            $note = '';
                            $id_customer = customers_insert($id_user, $_POST['receiver_name'], $_POST['receiver_phone'], $_POST['receiver_address'], $note);
                            $_SESSION['customer_order']['id_customer'] = $id_customer;
                        }

                        insert_order($id_customer, $_POST['receiver_name'], $_POST['receiver_phone'], $_POST['receiver_address'], $_POST['list_payment']);
                    } catch (Exception $exc) {
                        $mess = $exc;
                    }
                }
                // var_dump($mess);
                if (isset($_SESSION['customer_order'])) {
                    $info_detail = get_bill_id_customer($_SESSION['customer_order']['id_customer']);
                }
                include('./success.php');
            } elseif (isset($_GET['detail_bill']) && isset($_GET['id-bill'])) {
                $list_detail = get_detail_bill($_GET['id-bill']);
                // var_dump($list_detail);
                include('./detail.php');
            } else {
                $productCart = show_cart();

                include('./cart.php');
            }
            ?>
        </div>
    </div>
</body>

</html>