<div class="box_success">
    <img id="img" src="<?= $IMG_URL ?>/bill/success.gif" alt="">
</div>
<style>
    .box_success {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100vw;
        background-color: aliceblue;
    }

    .box_success img {
        object-fit: contain;
        mix-blend-mode: color-burn;
    }
</style>
<?php
if (isset($_SESSION['listPayment'])) {
    $time_set = 4000;
} else {
    $time_set = 0;
} ?>
<script>
    window.scrollTo(0, 100)
    const myTimeout = setTimeout(Render, <?= $time_set ?>);

    function Render() {
        document.getElementById("img").src = '<?= $IMG_URL ?>/bill/success.png';
        document.querySelector(".box_success").innerHTML += `<div class="mt-3">
        <button class='btn btn-success text_content'><a href="<?= $CART_URL ?>?detail_bill&id-bill=<?= $info_detail['info']?>">Xem chi tiết</a></button>
        <button class='btn btn-success text_content'><a href="<?= $ROOT_URL ?>/shop">Tiếp tục mua hàng</a></button>
    </div>`
        <?php
        unset($_SESSION['listPayment']);
        ?>
    }
</script>