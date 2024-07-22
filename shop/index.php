<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/home/style.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <link rel="stylesheet" href="../css/shop/index.css" />
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
  $SHOP_URL = $ROOT_URL . '/shop/index.php';
  if (!isset($_SESSION['user']) && isset($_SESSION['customer_order'])) {
    ob_start();
    $id_customer_order = (string)$_SESSION['customer_order']['id_customer'];
    $expiration_time = time() + (30 * 24 * 60 * 60);
    setcookie('id_customer_order', $id_customer_order, $expiration_time, '/');
    ob_end_flush();
  }
  ?>

</head>


<body>
  <div class="container-plus">
    <!-- Header -->
    <?php
    include("$LAYOUT_URL/header.php");
    ?>
    <div class="container d-flex mt-3">

      <div class="cart">
        <form class="form_search" action="<?= $SHOP_URL ?>" method="get">
          <input name="keysearches" class="form-control keysearches" type="text" placeholder="Nhập tên sản phẩm...">
          <input name="page" type="hidden" value="1">
          <button type="submit" class="btn form-control btn-info btn_search"><img src="<?php echo $IMG_URL; ?>/shop/icon_search.png" alt=""></button>
        </form>
        <?php
        $total = 0;
        if (isset($_SESSION["cart_user"])) {
          if (isset($_SESSION["user"])) {
            if (isset($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"])) {
              foreach ($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"] as $value) {
                $total +=  $value['amount'];
              }
            }
          } else {
            if (isset($_SESSION["cart_user"]["customer"]["cart"])) {
              foreach ($_SESSION["cart_user"]["customer"]["cart"] as $value) {
                $total = $total +  $value['amount'];
              };
            }
          }
        }

        ?>
        <a href="<?= $ROOT_URL ?>/cart">
          <p>Giỏ hàng (<?= $total ?>)</p>
        </a>


      </div>
    </div>
    <?php
    $showProduct = 20;
    $categogies = get_all_categories();
    $countPage = count_all_products();
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if (isset($_GET['category'])) {
        $nameFirms = get_product_name_firms_category($_GET['category']);
        $products = get_product_category($_GET['category'], $showProduct, $showProduct * ($page - 1));
        $countPage = count_product_category($_GET['category']);
        $totalpage =  ceil($countPage[0]['total'] / $showProduct);
        include('./category-product.php');
      } elseif (isset($_GET['keysearches'])) {
        $err = count_product_search_name($_GET['keysearches']);
        if ($err < 1) {
          $mess = [
            'title' => " Không có sản phẩm nào có tên gần với " . $_GET['keysearches'],
          ];
        } else {
          $products = get_product_search_name($_GET['keysearches'], $showProduct, $showProduct * ($page - 1));
          $mess = [
            'title' => "Tất cả sản phẩm có tên gần với " . $_GET['keysearches'],
            'method' => 'keysearches',
            'key' => $_GET['keysearches']
          ];
          $countPage = $err;
          $totalpage =  ceil($countPage / $showProduct);
        }
        include('./search-product.php');
      } elseif (isset($_GET['firms-searches'])) {
        $err = count_product_search_firms($_GET['firms-searches']);
        if ($err < 1) {
          $mess = [
            'title' => " Hiện chưa có sản phẩm nào của hãng " . $_GET['firms-searches'],
          ];
        } else {
          $products = get_product_firms($_GET['firms-searches'], $showProduct, $showProduct * ($page - 1));
          $mess = [
            'title' => "Tất cả sản phẩm của " . $_GET['firms-searches'],
            'method' => 'firms-searches',
            'key' => $_GET['firms-searches']
          ];
          $countPage = $err;
          $totalpage = ceil($countPage / $showProduct);
        }
        include('./search-product.php');
      } else {
        $products = get_products_limit($showProduct, $showProduct * ($page - 1));
        $totalpage =  ceil($countPage[0]['total'] / $showProduct);
        include('./show-product.php');
      }
    } elseif (isset($_GET['info-product'])) {
      $infoProduct = get_info_product($_GET['info-product']);
      $rate = rates_product($infoProduct['id_product']);
      $comments = comments_product($infoProduct['id_product']);
      if (isset($_POST['post_comment']) && ($_POST['post_comment'])) {
        try {
          comments_insert('', $infoProduct['id_product'], $_SESSION['user']['id_user'], $_POST['comment'], 2);
          $mess = "Bạn đã thêm một bình luận!";
        } catch (Exception $exc) {
          $mess = $exc;
        } finally {
          echo "<script language='javascript'>
        window.location.href = window.location.href;
        </script>";
        }
      } elseif (isset($_POST['add_cart']) && ($_POST['add_cart'])) {
        try {
          $check = check_cart($infoProduct['id_product']);
          if ($check !== false) {
            cart_update($check, $_POST['amount']);
          } else {
            cart_insert($infoProduct['id_product'], $_POST['amount']);
          }
          $mess = "Bạn đã thêm sản phẩm vào giỏ hàng!";
        } catch (Exception $exc) {
          $mess = $exc;
        } finally {
          echo "<script language='javascript'>
        window.location.href = window.location.href;
        </script>";
        }
      }

      include('./info-product.php');
    } else {
      $page = 1;
      $products = get_products_limit($showProduct, $showProduct * ($page - 1));
      $totalpage =  ceil($countPage[0]['total'] / $showProduct);
      include('./show-product.php');
    }
    ?>


    <hr style="margin: 20px 20%" />
    <!-- FOOTER -->
    <?php
    include("$LAYOUT_URL/footer.php");

    ?>
  </div>
</body>

</html>