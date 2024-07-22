<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">

    <form action="<?= $CART_URL ?>?bill" method="post" class="row d-flex justify-content-center h-100">
      <div class="col-12">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Giỏ hàng của bạn</h3>
          <!-- <div>
            <p class="mb-0"><span class="text-muted">Sort by:</span> <a href="#!" class="text-body">price <i class="fas fa-angle-down mt-1"></i></a></p>
          </div> -->
          <p class="fw-normal mb-0 text-black text-muted" id="reminder"></p>
        </div>
        <?php
        if ($productCart) {
        ?>

          <div class="box_show_cart">
            <?php
            // var_dump($productCart);
            foreach ($productCart as $key => $product_info) {
              $product = get_info_product_cart($product_info['id_product']);
            ?>
              <div class="card rounded-3 mb-4">
                <!-- <form method="get"> -->
                <div class="card-body" style="padding: 0px;">
                  <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-md-1 col-lg-1 col-xl-1 form-check form-switch">
                      <input class="form-check-input box_check_cart" type="checkbox" style="margin: 0px;" id="choose_cart_product" name="id_cart[]" value="<?= $key ?>">
                      <!-- <label class="form-check-label" for="choose_cart_product">Mua</label> -->
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2">
                      <img src="<?= $IMG_URL ?>/shop/<?= $product['img_product'] ?>" class="img-fluid rounded-3" alt="<?= $product['name'] ?>">
                    </div>
                    <div class="col-md-2 col-lg-3 col-xl-3">
                      <p class="lead fw-normal mb-2"><?= $product['name'] ?></p>
                      <p><span class="text-muted">Thương hiệu: </span><?= $product['firms'] ?></p>
                    </div>
                    <div class="col-md-1 col-lg-2 col-xl-2 d-flex align-items-center">
                      <!-- <input type="hidden" name="product_edit" value="<?= $product['id_product'] ?>"> -->
                      <!-- <input type="submit" class="btn h1" name="subtract" value="-"> -->
                      <a href="<?= $CART_URL ?>?subtract&product_edit=<?= $product['id_product'] ?>" class=" <?php if ($product_info['amount'] <= 1) {
                                                                                                                echo 'disabled';
                                                                                                              } ?>">-</a>
                      <p class="h1 cart_amount_product" style="margin: 0px;padding: 0px 10px;"><?= $product_info['amount'] ?></p>
                      <!-- <input type="submit" class="btn h1" name="add" value="+"> -->
                      <a href="<?= $CART_URL ?>?add&product_edit=<?= $product['id_product'] ?>">+</a>
                    </div>
                    <div class="col-md-5 col-lg-3 col-xl-2 offset-lg-1" style="margin: 0px;">
                      <h5 class="mb-0 cart_price_product"><?= ConvertNum($product['price'] - ($product['price'] * $product['discount'] / 100)) ?> VNĐ</h5>
                    </div>
                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                      <a href="<?= $CART_URL ?>?delete&id-product=<?= $product_info['id_product'] ?>&index-cart=<?= $key ?>" class="text-danger open_popup">X</a>
                    </div>
                  </div>
                </div>
                <!-- </form> -->
              </div>
            <?php

            }
            ?>
          </div>
        <?php
        } else {
        ?>
          <img src="<?= $IMG_URL ?>/shop/cart_null.png" width="50%" style="margin-left: 25%;" alt="">
        <?php
        }
        ?>
        <div class="col-12 d-flex justify-content-between align-items-center" id="btn_payment">
        </div>
        <?php
        if (isset($_GET['delete'])) {
        ?>
          <div class="modal is__visible">
            <div class="modal__content">
              <h1>Xác nhận</h1>
              <p>
                Bạn có chắc chắn là sẽ xóa <?php if (isset($_SESSION['user']['id_user'])) {
                                              echo $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$_GET['index-cart']]['amount'];
                                            } else echo $_SESSION["cart_user"]["customer"]["cart"][$_GET['index-cart']]['amount'] ?> sản phẩm <?php $product = get_info_product_cart($productCart[$_GET['index-cart']]['id_product']);
                                                                                                                                                echo $product['name'] ?> ra khỏi giỏ hàng?
              </p>

              <div class="modal__footer close__link">
                <a href="<?= $CART_URL ?>?delete-product-cart=true&id-cart-user=<?= $_GET['index-cart'] ?>">Xác nhận</a>
              </div>
              <a href="#" class="modal__close">&times;</a>
            </div>
            <div class="back_ground_box"></div>
          </div>
        <?php
        } else {
        ?>
          <div class="modal">
            <div class="modal__content">
              <h1>Xác nhận</h1>
              <p>
                Bạn có chắc chắn là sẽ xóa <?php if (isset($_SESSION['user']['id_user'])) {
                                              echo $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][0]['amount'];
                                            } else echo $_SESSION["cart_user"]["customer"]["cart"][0]['amount'] ?> sản phẩm <?php $product = get_info_product_cart($productCart[0]['id_product']);
                                                                                                                              echo $product['name'] ?> ra khỏi giỏ hàng?
              </p>

              <div class="modal__footer close__link">
                <a href="<?= $CART_URL ?>?delete-product-cart=true&id-cart-user=0">Xác nhận</a>
              </div>
              <a href="#" class="modal__close">&times;</a>
            </div>
            <div class="back_ground_box"></div>
          </div>
        <?php
        }
        ?>
      </div>
    </form>
  </div>
</section>
<style>
  a.disabled {
    pointer-events: none;
    cursor: default;
  }
</style>

<script>
  window.addEventListener("load", function(e) {
    document.querySelector('.open_popup').addEventListener("click", function(e) {
      event.preventDefault();
      document.querySelector('.modal').classList.add('is__visible');
    })
    //close popup
    document.querySelector('.close__link').addEventListener("click", function(e) {
      // event.preventDefault();
      document.querySelector('.modal').classList.remove('is__visible');
      // window.location.href = './index.php';
    })
    document.querySelector('.modal__close').addEventListener("click", function(e) {
      event.preventDefault();
      document.querySelector('.modal').classList.remove('is__visible');
      window.location.href = './index.php';
    })
    document.querySelector('.back_ground_box').addEventListener("click", function(e) {
      event.preventDefault();
      document.querySelector('.modal').classList.remove('is__visible');
      window.location.href = './index.php';
    })


    //close popup when clicking the esc keyboard button
    document.addEventListener("keyup", function(event) {
      if (event.which == '27') {
        document.querySelector('.modal').classList.remove('is__visible');
        window.location.href = './index.php';

      }
    });

    function ConvertStringToNumber(stringNum) {
      return Number(stringNum.replace(/[^0-9.-]+/g, ""));
    }

    function ConvertNum(num) {
      return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    let btnPayment = document.getElementById('btn_payment');
    let boxReminder = document.getElementById('reminder');
    let listBoxCheck = document.querySelectorAll('.box_check_cart');
    let listPriceCheck = document.querySelectorAll('.cart_price_product');
    let listAmountCheck = document.querySelectorAll('.cart_amount_product');
    boxReminder.innerHTML = 'Hãy chọn sản phẩm mà bạn muốn mua!';

    listBoxCheck.forEach((value, index) => {
      value.addEventListener('click', function(e) {
        let countCheck = 0;
        let pricePayment = 0;
        listBoxCheck.forEach((value2, index2) => {
          // listBoxCheck[index2].checked && countCheck++;
          if (listBoxCheck[index2].checked) {
            countCheck++;
            pricePayment += ConvertStringToNumber(listPriceCheck[index2].innerHTML) * ConvertStringToNumber(listAmountCheck[index2].innerHTML);
            console.log(countCheck);
          }
        });
        if (countCheck <= 0) {
          btnPayment.innerHTML = '';
          boxReminder.innerHTML = 'Hãy chọn sản phẩm mà bạn muốn mua!';
        } else {
          boxReminder.innerHTML = '';
          btnPayment.innerHTML = `
        <p class="h1" style="margin:0px">Tổng tiền: ${ConvertNum(pricePayment)} VNĐ</p>
        <input type="submit" class="btn btn-warning btn-block btn-lg" value="Thanh toán">
        `
        }
      })
    });

  });
</script>