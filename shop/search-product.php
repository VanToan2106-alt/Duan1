<?php
if ($err < 1) {
?>
    <div class="container text-center">
        <h2 class="text-center h1 text-uppercase m-5"> <?= $mess['title'] ?> </h2>
        <br /><button onclick='history.back()' class='btn btn-success btn_product text_content'>Trở lại</button>
    </div>
<?php
} else {
?>

    <h2 class="text-center h1 text-uppercase m-5"> <?= $mess['title'] ?> </h2>

    <div class="container">
        <div class="row ">
            <?php foreach ($products as $product) {
                $rate = rates_product($product['id_product']) ?>
                <div class="col-sm-3 mt-3">
                    <div class="product">
                        <h2>
                            <?= $product['name'] ?>
                        </h2>
                        <img src="<?php echo $IMG_URL; ?>/shop/<?= $product['img_product'] ?>" alt="">
                        <div class="container">
                            <p class="h4"> Giá: <del><?= ConvertNum($product['price']) ?> VNĐ</del></p>
                            <p class="h3">
                                Giảm còn:
                                <b class="text-danger">
                                    <?= ConvertNum($product['price'] - ($product['price'] * $product['discount'] / 100)) ?> VNĐ
                                </b>
                            </p>

                        </div>
                        <div class="container btn_product_box">
                            <form class="btn_product_box " method="post" action="<?= $ROOT_URL ?>/cart/index.php?bill">

                                <input class="btn btn-success btn-sm text_order" type="submit" name="order_now" value="Mua">
                                <input type="hidden" name="id_cart[]" value="<?= $product['id_product'] ?>">
                                <input type="hidden" name="amount" value="1">

                                </form>

                                <button class="btn btn-info btn-sm"><a href="<?= $SHOP_URL ?>?info-product=<?= $product['id_product'] ?>">Xem</a></button>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
            <!-- Nav controll product -->

            <nav aria-label="Page navigation example" style="margin-top: 20px;">
                <ul class="pagination justify-content-center">
                    <li class='page-item <?php if ($page <= 1) echo 'disabled'; ?>'>
                        <a class="page-link link_nav_shop" href="<?= $SHOP_URL ?>?page=<?= $page - 1 ?>&<?= $mess['method'] ?>=<?= $mess['key'] ?>">Previous</a>
                    </li>
                    <li class="page-item"><a class="page-link link_nav_shop <?php if ($page == 1) echo 'link_nav_shop_active' ?>" href="<?= $SHOP_URL ?>?page=1&<?= $mess['method'] ?>=<?= $mess['key'] ?>">1</a></li>
                    <?php
                    for ($i = 2; $i <= $totalpage; $i++) { ?>
                        <li class="page-item">
                            <a class="page-link link_nav_shop <?php if ($page == $i) echo 'link_nav_shop_active' ?>" href="<?= $SHOP_URL ?>?page=<?= $i ?>&<?= $mess['method'] ?>=<?= $mess['key'] ?>"><?= $i ?></a>
                        </li>
                    <?php
                    }
                    ?>

                    <li class='page-item <?php if ($page > $totalpage - 1) echo 'disabled' ?>'>
                        <a class="page-link link_nav_shop" href="<?= $SHOP_URL ?>?page=<?= $page + 1 ?>&<?= $mess['method'] ?>=<?= $mess['key'] ?>">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
<?php
}
?>
<style>
    .text_order{
        font-size: 24px;
        font-weight: bolder;
        text-decoration: none;
        color: black;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0px 25px;
    }
</style>