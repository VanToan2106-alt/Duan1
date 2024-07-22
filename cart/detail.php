<section class="h-100 " style="background-color: #eee;">
    <div class="container h-100 py-5">

        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
                <div class="card shopping-cart" style="border-radius: 15px;">
                    <div class="container">
                        <h3 class="mt-5 ml-2 fw-bold text-left text-uppercase" style="margin-left: 15px;">Trạng thái đơn hàng: <span style="color:green;text-transform: capitalize;"><?= $arrStatus[$list_detail[0]['status']] ?></span></h3>
                    </div>


                    <div class="card-body text-black">
                        <style>
                            .text-left {
                                margin-top: 5px;
                                color: var(--color_main);
                                font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
                                font-size: 18px;
                                font-weight: bold;
                            }
                        </style>
                        <div class="row">
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-3 pt-2 text-center fw-bold text-uppercase">Sản phẩm mà bạn đặt mua</h3>
                                <div class="box_show_cart">
                                    <?php
                                    $totalBill = 0;
                                    $totalDiscount = 0;
                                    foreach ($list_detail as $key => $item) {
                                        $img_product = get_img($item['id_product']);
                                        $totalDiscount += ($item['price']);
                                        $totalBill += ($item['price']) * $item['amount'];
                                    ?>
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="flex-shrink-0">
                                                <img src="<?= $IMG_URL; ?>/shop/<?= $img_product['img_product'] ?>" class="img-fluid" style="width: 150px;" alt="<?= $item['name_product'] ?>">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <a href="#!" class="float-end text-black"><i class="fas fa-times"></i></a>
                                                <h5 class="text-primary"><?= $item['name_product'] ?></h5>
                                                <div class="d-flex align-items-center">
                                                    <p class="fw-bold mb-0 me-5 pe-3"><?= ConvertNum($item['price']) ?> VNĐ</p>
                                                    <div class="def-number-input number-input safari_only">
                                                        <input class="quantity fw-bold text-black" min="0" name="quantity" value="<?= $item['amount'] ?>" type="number" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    }

                                    ?>
                                </div>

                                <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">
                                <div class="d-flex justify-content-between p-2 mb-2" style="background-color: #e1f5fe;">
                                    <h5 class="fw-bold mb-0">Tổng tiền:</h5>
                                    <h5 class="fw-bold mb-0"><?= ConvertNum($totalBill) ?> VNĐ</h5>
                                </div>

                            </div>
                            <div class="col-lg-6 px-5 py-4">

                                <h3 class="mb-3 pt-2 text-center fw-bold text-uppercase">Thông tin mua hàng</h3>

                                <div class="mb-3">
                                    <div class="form-outline mb-3">
                                        <input type="text" id="typeText" name="receiver_name" class="form-control form-control-lg" value="<?= $item['receiver_name'] ?>" readonly />
                                        <label class="form-label" for="typeText">Tên người nhận</label>
                                    </div>
                                    <div class="form-outline mb-3">
                                        <input type="text" id="typeText" name="receiver_phone" class="form-control form-control-lg" readonly value="<?= $item['receiver_phone'] ?>" />
                                        <label class="form-label" for="typeText">Số điện thoại người nhận</label>
                                    </div>

                                    <div class="form-outline mb-3">
                                        <input type="text" id="typeName" name="receiver_address" class="form-control form-control-lg" readonly value="<?= $item['receiver_address'] ?>" />
                                        <label class="form-label" for="typeName">Địa chỉ giao hàng</label>
                                    </div>
                                    <?php
                                    if ($list_detail[0]['status'] < 3) {
                                    ?>
                                        <button onclick='history.back()' class="btn btn-primary btn-block btn-lg"> Quay lại</button>
                                    <?php
                                    }
                                    ?>

                                    <h5 class="fw-bold mb-3" style="position: absolute; bottom: 0;">
                                        <a href="<?= $ROOT_URL ?>/shop"><i class="fas fa-angle-left me-2"></i>Quay lại mua sắm</a>
                                    </h5>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.scrollTo(0, 100)
</script>