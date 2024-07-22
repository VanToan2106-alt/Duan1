<div class='container'>
    <!-- <?php
    if (isset($mess)) {
        echo  $mess;
    }
    ?> -->
    <div class="row detail_product">
        <img class="col-sm-6 mt-4" src="<?php echo $IMG_URL; ?>/shop/<?= $infoProduct['img_product'] ?>" alt="Hình sản phẩm">
        <div class="col-sm-6 mt-4 product_info">
            <h1 class="tittle"> <?= $infoProduct['name'] ?> </h1>
            <div class="mt-3">
                <span class="price_discout text-danger">Khuyến mãi: </span>
                <span class="price_discout text-danger"><?= ConvertNum($infoProduct['price'] - ($infoProduct['price'] * $infoProduct['discount'] / 100)) ?></span>
            </div>
            <div class="mt-3">
                <span class="text_content">Giá chính: </span>
                <del class="text_content"><?= ConvertNum($infoProduct['price']) ?></del>
            </div>

            <div class="mt-3">
                <span class="text_content">Mô tả: </span>
                <span class="text_content"><?= $infoProduct['description'] ?></span>
            </div>
            <form method="post">
                <div class="mt-3">
                    <span class="text_content">Số lượng: </span>
                    <input class="text_content" size="4" type="number" name="amount" id="soluong" min="1" max="50" value="1">
                </div>
                <div class="mt-3">
                    <input class='btn btn-primary btn_product text_content' name="add_cart" type="submit" value="Thêm vào giỏ">
                    <button class='btn btn-success btn_product text_content'><a href="<?= $SHOP_URL?>">Trở lại</a></button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- {{-- Box Comments --}} -->
<section style="background-color: #f7f6f6;">
    <div class="container my-5 py-5 text-dark">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-10 col-xl-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>

                        <span class="text_content">Đánh giá về sản phẩm: <?= number_format($rate['rate_product'], 1, '.', ',') ?>/5</span>
                        <div class="stars d-flex">
                            <svg width="40" height="40" viewBox="0 0 940.688 940.688">
                                <path d="M885.344,319.071l-258-3.8l-102.7-264.399c-19.8-48.801-88.899-48.801-108.6,0l-102.7,264.399l-258,3.8 c-53.4,3.101-75.1,70.2-33.7,103.9l209.2,181.4l-71.3,247.7c-14,50.899,41.1,92.899,86.5,65.899l224.3-122.7l224.3,122.601 c45.4,27,100.5-15,86.5-65.9l-71.3-247.7l209.2-181.399C960.443,389.172,938.744,322.071,885.344,319.071z" />
                            </svg>
                            <svg width="40" height="40" viewBox="0 0 940.688 940.688">
                                <path d="M885.344,319.071l-258-3.8l-102.7-264.399c-19.8-48.801-88.899-48.801-108.6,0l-102.7,264.399l-258,3.8 c-53.4,3.101-75.1,70.2-33.7,103.9l209.2,181.4l-71.3,247.7c-14,50.899,41.1,92.899,86.5,65.899l224.3-122.7l224.3,122.601 c45.4,27,100.5-15,86.5-65.9l-71.3-247.7l209.2-181.399C960.443,389.172,938.744,322.071,885.344,319.071z" />
                            </svg>
                            <svg width="40" height="40" viewBox="0 0 940.688 940.688">
                                <path d="M885.344,319.071l-258-3.8l-102.7-264.399c-19.8-48.801-88.899-48.801-108.6,0l-102.7,264.399l-258,3.8 c-53.4,3.101-75.1,70.2-33.7,103.9l209.2,181.4l-71.3,247.7c-14,50.899,41.1,92.899,86.5,65.899l224.3-122.7l224.3,122.601 c45.4,27,100.5-15,86.5-65.9l-71.3-247.7l209.2-181.399C960.443,389.172,938.744,322.071,885.344,319.071z" />
                            </svg>
                            <svg width="40" height="40" viewBox="0 0 940.688 940.688">
                                <path d="M885.344,319.071l-258-3.8l-102.7-264.399c-19.8-48.801-88.899-48.801-108.6,0l-102.7,264.399l-258,3.8 c-53.4,3.101-75.1,70.2-33.7,103.9l209.2,181.4l-71.3,247.7c-14,50.899,41.1,92.899,86.5,65.899l224.3-122.7l224.3,122.601 c45.4,27,100.5-15,86.5-65.9l-71.3-247.7l209.2-181.399C960.443,389.172,938.744,322.071,885.344,319.071z" />
                            </svg>
                            <svg width="40" height="40" viewBox="0 0 940.688 940.688">
                                <path d="M885.344,319.071l-258-3.8l-102.7-264.399c-19.8-48.801-88.899-48.801-108.6,0l-102.7,264.399l-258,3.8 c-53.4,3.101-75.1,70.2-33.7,103.9l209.2,181.4l-71.3,247.7c-14,50.899,41.1,92.899,86.5,65.899l224.3-122.7l224.3,122.601 c45.4,27,100.5-15,86.5-65.9l-71.3-247.7l209.2-181.399C960.443,389.172,938.744,322.071,885.344,319.071z" />
                            </svg>
                            <div class="overlay" style="width: <?= 100 - ($rate['rate_product'] * 20) ?>%"></div>
                        </div>
                    </div>
                    <h4 class="text-dark mb-0">Bình luận về sản phẩm </h4>

                </div>
                <div class="box-comment">
                    <?php
                    $currentTime = get_currenttime();
                    foreach ($comments  as $comment) {
                    ?>

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-start">
                                    <!-- <img class="rounded-circle shadow-1-strong me-3" src="<?php echo $IMG_URL; ?>/users/<?= $comment['avatar'] ?>" alt="avatar" width="40" height="40" /> -->
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="text-primary fw-bold mb-0">
                                                <?= $comment['email'] ?>
                                            </h6>
                                            <p class="mb-0"><?= ConvertTimeCurrent($comment['day_post'], $currentTime['currentTime']) ?></p>

                                        </div>
                                        <p> <?= $comment['content'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <style>
                        .box-comment {
                            display: block;
                            max-height: 300px;
                            overflow-y: scroll;
                        }
                    </style>
                </div>
                <?php
                if (isset($_SESSION['user'])) {
                ?>
                    <form method="post" class="mt-5">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="d-flex flex-start">
                                    
                                    <div class="w-100">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="text-primary fw-bold mb-0">
                                                <?= $_SESSION['user']['email'] ?>
                                            </h6>
                                            <input class="btn btn-primary btn_product text_content" name="post_comment" type="submit" value="Gửi">
                                        </div>
                                        <div class="form-group">
                                            <label>Viết câu trả lời:</label>
                                            <textarea name="comment" class="form-control mt-3" rows="3" required></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                <?php
                } ?>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        window.scrollTo(0, 100)
    </script>