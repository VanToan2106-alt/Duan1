<section class="h-100 " style="background-color: #eee;">
    <div class="container h-100 py-5">
        <?php
        if (isset($_POST['id_cart'])) {
            $_SESSION['listPayment'] = $_POST['id_cart'];
        }
        if (isset($_SESSION['customer_order']['id_customer'])) {
            $info_customer = get_info_customer($_SESSION['customer_order']['id_customer']);
            if ($info_customer == null) {
                unset($_SESSION['customer_order']);
            }
        }
        ?>
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card shopping-cart" style="border-radius: 15px;">
                    <div class="card-body text-black">

                        <div class="row">
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Các sản phẩm bạn đã chọn</h3>
                                <div class="box_show_cart">
                                    <?php
                                    if (isset($_SESSION['listPayment'])) {
                                        $totalBill = 0;
                                        $totalDiscount = 0;
                                        foreach ($_SESSION['listPayment'] as $key => $id_cart_payment) {
                                            if (isset($_POST['order_now']) && $_POST['order_now']) {
                                                $_SESSION['order_now']['id_product'] = $_SESSION['listPayment'];
                                                $product = seen_product_now($id_cart_payment);
                                            } else {
                                                if (isset($_SESSION['order_now']['id_product']) && $_SESSION['listPayment'][0] == $_SESSION['order_now']['id_product'][0]) {
                                                    $product = seen_product_now($id_cart_payment);
                                                    $amount = 1;
                                                } else {
                                                    $product = seen_product_cart($id_cart_payment);
                                                }
                                            }
                                            $totalDiscount += ($product['price'] * $product['discount'] / 100);
                                            if (isset($_POST['order_now']) && $_POST['order_now']) {
                                                $amount = $_POST['amount'];
                                            } else {
                                                if (isset($_SESSION['user']['id_user'])) {
                                                    if (isset($_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$id_cart_payment])) {
                                                        $amount = $_SESSION["cart_user"][$_SESSION["user"]["id_user"]]["cart"][$id_cart_payment]['amount'];
                                                    }
                                                } else {
                                                    if (isset($_SESSION["cart_user"]["customer"])) {
                                                        if (isset($_SESSION["cart_user"]["customer"]["cart"][$id_cart_payment])) {
                                                            $amount = $_SESSION["cart_user"]["customer"]["cart"][$id_cart_payment]['amount'];
                                                        }
                                                    }
                                                }
                                            }
                                            $totalBill += ($product['price'] - ($product['price'] * $product['discount'] / 100)) * $amount;
                                    ?>
                                            <div class="d-flex align-items-center mb-5">
                                                <div class="flex-shrink-0">
                                                    <img src="<?= $IMG_URL; ?>/shop/<?= $product['img_product'] ?>" class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                                                </div>
                                                <div class="flex-grow-1 ms-3">
                                                    <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                                                    <h5 class="text-primary"><?= $product['name'] ?></h5>
                                                    <h6 style="color: #9e9e9e;">Thương hiệu: <?= $product['firms'] ?></h6>
                                                    <div class="d-flex align-items-center">
                                                        <p class="fw-bold mb-0 me-5 pe-3"><?= ConvertNum($product['price']) ?> VNĐ</p>
                                                        <div class="def-number-input number-input safari_only">
                                                            <input class="quantity fw-bold text-black" min="0" name="quantity" value="<?= $amount ?>" type="number" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>

                                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">

                                <div class="d-flex justify-content-between px-x">
                                    <p class="fw-bold">Giảm:</p>
                                    <p class="fw-bold"><?= ConvertNum($totalDiscount) ?> VNĐ</p>
                                </div>
                                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                    <h5 class="fw-bold mb-0">Tổng tiền:</h5>
                                    <h5 class="fw-bold mb-0"><?= ConvertNum($totalBill) ?> VNĐ</h5>
                                </div>

                            </div>
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Thông tin thanh toán</h3>

                                <form action="<?= $CART_URL ?>?order" method="post" class="mb-5">
                                    <?php
                                    if (isset($_SESSION['listPayment'])) {

                                        foreach ($_SESSION['listPayment'] as $key => $id_cart_payment) {
                                    ?>
                                            <input type="hidden" name="list_payment[]" value="<?= $id_cart_payment ?>" />
                                    <?php
                                        }
                                    } ?>
                                    <?php
                                    if (isset($_SESSION['user']['id_user'])) {
                                        $listCustomer = get_user_customers_bill($_SESSION['user']['id_user']);
                                        if ($listCustomer) {
                                            if (!isset($_SESSION['customer_order']['id_customer'])) {
                                                echo "<script language='javascript'>
                                                window.location.href = '" . $CART_URL . "?bill&id-customer=" . $listCustomer[0]['id_customer'] . "';
                                                </script>";
                                            }
                                    ?>
                                            <div class="form-outline mb-5">
                                                <select name="id_customer" id="id_customer" class="form-control" onchange="handleSelect()">
                                                    <?php
                                                    if (isset($_SESSION['customer_order']['id_customer'])) {
                                                    ?>
                                                        <option class="address_customer" value="<?= $ROOT_URL ?>/cart/index.php?bill&id-customer=<?= $customer['id_customer'] ?>" selected>
                                                            <?php
                                                            if ($info_customer['note'] != '') {
                                                                echo $info_customer['note'];
                                                            } else {
                                                                echo $info_customer['address'];
                                                            } ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    foreach ($listCustomer as $key => $customer) {
                                                        if (isset($_SESSION['customer_order']['id_customer']) && $_SESSION['customer_order']['id_customer'] != $customer['id_customer']) {

                                                        ?>
                                                            <option class="address_customer" value="<?= $ROOT_URL ?>/cart/index.php?bill&id-customer=<?= $customer['id_customer'] ?>">
                                                                <?php
                                                                if ($customer['note'] != '') {
                                                                    echo $customer['note'];
                                                                } else {
                                                                    echo $customer['address'];
                                                                } ?>
                                                            </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <span class="form-label">Địa chỉ bạn từng đặt hàng:</span>
                                            </div>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <script type="text/javascript">
                                        function handleSelect(elm) {
                                            window.location.href = document.getElementById('id_customer').value;
                                        }
                                    </script>



                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeText" name="receiver_name" class="form-control form-control-lg" value="<?php
                                                                                                                                            if (isset($_SESSION['customer_order']['id_customer'])) {
                                                                                                                                                echo $info_customer['full_name'];
                                                                                                                                            }
                                                                                                                                            ?>" required />
                                        <label class="form-label" for="typeText">Tên người nhận</label>
                                    </div>
                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeText" name="receiver_phone" class="form-control form-control-lg" value="<?php
                                                                                                                                            if (isset($_SESSION['customer_order']['id_customer'])) {
                                                                                                                                                echo $info_customer['phone'];
                                                                                                                                            }
                                                                                                                                            ?>" required />
                                        <label class="form-label" for="typeText">Số điện thoại người nhận</label>
                                    </div>

                                    <div class="form-outline mb-5">
                                        <input type="text" id="typeName" name="receiver_address" class="form-control form-control-lg" value="<?php
                                                                                                                                                if (isset($_SESSION['customer_order']['id_customer'])) {
                                                                                                                                                    echo $info_customer['address'];
                                                                                                                                                }
                                                                                                                                                ?>" required />
                                        <label class="form-label" for="typeName">Địa chỉ giao hàng</label>
                                    </div>

                                    <p class="mb-5">Quý khách xin vui lòng nhập chính xác thông tin để nhận hàng nhanh nhất.</p>

                                    <input type="submit" class="btn btn-primary btn-block btn-lg" name="order_cart" id="" value="Đặt hàng">
                                    <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                                        <a href="<?= $ROOT_URL ?>/shop"><i class="fas fa-angle-left me-2"></i>Quay lại mua sắm</a>
                                    </h5>

                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>