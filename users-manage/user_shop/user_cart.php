  <h3 class="text_changePass">Đơn hàng của tôi</h3>
  <h3 class="text_changePass">Trạng thái: <?= $arrStatus[$statusBill] ?></h3>

  <div class="info_Carts">
      <ul class="menu_cart">
          <?php
            foreach ($arrStatus as $key => $status) {
            ?><li>
                  <a href="?my_cart&status=<?= $key ?>"><?= $status ?></a>
              </li>
          <?php
            }
            ?>


      </ul>
      <div class="body_cart_show">
          <?php
            foreach ($list_adress as $key1 => $value) {
                $bills = get_bills_customer_status($value['id_customer'], $statusBill);
                foreach ($bills as $key2 => $bill) {
                    $shows = get_detail_bill($bill['id_bill']);
                    foreach ($shows as $key3 => $show) {
                        $get_img = get_img($show['id_product']);

            ?>

                      <div class="my_cart">
                          <img src="<?= $IMG_URL ?>/shop/<?= $get_img['img_product'] ?>" alt="" width="150" class="cart_image" />
                          <div class="cart_about">
                              <p class="product_name"><?= $show['name_product'] ?></p>
                              <p class="product_price">
                                  <strong>Giá: </strong><?= ConvertNum($show['price']) ?>
                              </p>
                              <h6 style="color: black;">Mã đơn:<?= $bill['id_bill'] ?></h6>
                              <div class="cart_support">
                                  <!-- bill_update_status($id_bill, $status) -->
                                  <?php

                                    switch ($bill['status']) {
                                        case 0:
                                        case 1:
                                        case 2:
                                    ?>
                                          <form style="display: inline-block;" method="post">
                                              <input type="hidden" name="bill" value="<?= $bill['id_bill'] ?>">
                                              <input type="hidden" name="status" value="<?= count($arrStatus) - 1 ?>">
                                              <button class="btn_request"><input style="color: white; border:0px;" type="submit" name="change_status_user" value="Yêu cầu hủy đơn"></button>
                                          </form>
                                      <?php
                                            break;
                                        case 3:
                                        ?>
                                          <form style="display: inline-block;" method="post">
                                              <input type="hidden" name="bill" value="<?= $bill['id_bill'] ?>">
                                              <input type="hidden" name="status" value="<?= $statusBill + 1 ?>">
                                              <button class="btn_request"><input style="color: white; border:0px;" type="submit" name="change_status_user" value="Đã nhận hàng"></button>
                                          </form>
                                      <?php
                                            break;
                                        case 4:
                                        ?>
                                          <form style="display: inline-block;" method="post">
                                              <input type="hidden" name="bill" value="<?= $bill['id_bill'] ?>">
                                              <input type="hidden" name="status" value="<?= $statusBill + 1 ?>">
                                              <button class="btn_request"><input style="color: white; border:0px;" type="submit" name="change_status_user" value="Từ chối đơn hàng"></button>
                                          </form>
                                      <?php
                                            break;
                                        case count($arrStatus) - 1:
                                        ?>
                                          <form style="display: inline-block;" method="post" action="<?= $ROOT_URL ?>/cart/index.php?bill">
                                              <input type="hidden" name="id_cart[]" value="<?= $show['id_product'] ?>">
                                              <input type="hidden" name="amount" value="<?= $show['amount'] ?>">
                                              <button class="btn_request"><input style="color: white; border:0px;" type="submit" name="order_now" value="Mua lại"></button>
                                          </form>
                                  <?php
                                            break;

                                        default:
                                            break;
                                    }

                                    ?>
                                  <a href="<?= $ROOT_URL ?>/cart/index.php?detail_bill&id-bill=<?= $bill['id_bill'] ?>">
                                      <button class="btn_contact">Xem chi tiết</button>
                                  </a>
                              </div>
                              </form>
                          </div>

                          <div class="cart_delivery">
                              <p class="transporting"><?= $arrStatus[$bill['status']] ?></p>
                          </div>
                      </div>
          <?php
                    }
                }
            } ?>

      </div>
  </div>
  <style>
      .menu_cart li a::first-letter {
          text-transform: capitalize;
      }

      .body_cart_show {
          height: 500px;
          max-height: 500px;
          overflow-y: scroll;
      }
  </style>
  <?php
    if (isset($_POST['change_status_user']) && $_POST['change_status_user']) {
        try {
            bill_update_status($_POST['bill'], $_POST['status']);
        } catch (Exception $exc) {
            var_dump($exc);
        } finally {
            echo "<script language='javascript'>
          window.location.href = '" . $ROOT_URL . "/users-manage/index.php?my_cart&status=" . $_POST['status'] . "';
          </script>";
        }
    }
    ?>