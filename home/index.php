<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/home/style.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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

        var index = 1;
        changeImage = function() {
            var imgs = ["../images/home/banner1.png", "../images/home/banner2.png", "../images/home/banner3.png"];
            document.getElementById('img').src = imgs[index];
            index++;
            if (index == 3) {
                index = 0;
            }
        }
        setInterval(changeImage, 1500);
    </script>

    <?php
    include('../global.php');
    ?>
</head>

<body>
    <div class="container-plus">
        <!-- Header -->
        <?php
        include("$LAYOUT_URL/header.php");
        ?>
        <!-- SLIDE SHOW -->
        <div class="auto-images">
            <div class="auto__items">
                <img id="img" src="../images/home/banner1.png" />
            </div>
        </div>
        <!-- TEXT ABOUT -->

        <!-- BUTTON -->
        <div class="btn-click d-flex justify-content-center">
            <button class="btn-54">
                <span class="shadow"></span>
                <span class="depth"></span>
                <span class="content">GO SHOPPING</span>
            </button>
        </div>

        <!-- ABOUT US -->
        <div class="d-flex justify-content-center align-items-center about_us" data-aos="fade-right">
            <div class="about_usLeft">
                <p class="about_tittle">VỀ CHÚNG TÔI</p>
                <p class="about_desc">
                    Hãy cùng nhau khám phá và tìm hiểu về OCTOTECH!!!
                </p>
                <img src="<?php echo $IMG_URL; ?>/home/logo-nav.png" alt="" />
            </div>
            <div class="about_usRight">
                <p>
                    " Chào mừng đến OCTOTECH, một nhóm đam mê công nghệ đầy nhiệt huyết
                    và động lực. Chúng tôi tự hào giới thiệu dự án của mình - một trang
                    web kinh doanh laptop, điện thoại và tablet độc đáo, nơi chúng tôi
                    tạo ra một trải nghiệm mua sắm đáng nhớ cho bạn. <br />
                    <br />
                    Được truyền cảm hứng bởi sự phát triển nhanh chóng của công nghệ và
                    niềm đam mê với việc tạo ra một nền tảng mua sắm trực tuyến tuyệt
                    vời, chúng tôi đã xây dựng một môi trường tin cậy và chuyên nghiệp,
                    nơi bạn có thể tìm thấy những sản phẩm công nghệ hàng đầu từ các
                    thương hiệu uy tín. "
                </p>
            </div>
        </div>
        <hr />
        <!-- PRODUCT HOT -->
        <div class="d-flex justify-content-center align-items-center about_hot" data-aos="fade-left" data-aos-duration="1000">
            <div class="hot_productLeft">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo $IMG_URL; ?>/home/hot_p1.png" class="d-block image_product" alt="..." />
                            <div class="carousel-caption d-none d-md-block caption_product">
                                <h5>IPAD Air M1</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $IMG_URL; ?>/home/hot_p2.jpg" class="d-block image_product" alt="..." />
                            <div class="carousel-caption d-none d-md-block caption_product">
                                <h5>Acer Nitro 5</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo $IMG_URL; ?>/home/hot_p3.jpg" class="d-block image_product" alt="..." />
                            <div class="carousel-caption d-none d-md-block caption_product">
                                <h5>Third slide label</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev prev_icon" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next next_icon" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="hot_productRight">
                <p class="tittle_Hot">SẢN PHẨM MỚI NHẤT</p>
                <p class="desc_hot">
                    Tổng hợp những dự án mới nhất từ OCTOTECH. Hãy là những người đầu
                    tiên sở hữu. Pre - Order ngay!
                </p>
            </div>
        </div>
        <hr />
        <!-- EXPLORE -->
        <div class="container d-flex justify-content-center align-items-center about_explore" data-aos="fade-left" data-aos-duration="1000">
            <div class="hot_productRight">
                <p class="explore_tittle">KHÁM PHÁ</p>
                <p class="explore_hot">
                    Hãy cùng OCTOTECH khám phá về những sản </br> 
                    phẩm mới mẻ, luôn được cập nhật liên tục.
                </p>
            </div>
            <div class="explore_product">
                <div class="lightbox">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="<?php echo $IMG_URL; ?>/home/g1.jpg" alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong rounded explore_img" />
                            <img src="<?php echo $IMG_URL; ?>/home/g2.jpg" alt="Coconut with Strawberries" class="w-100 shadow-1-strong rounded explore_img" />
                        </div>
                        <div class="col-lg-6">
                            <img src="<?php echo $IMG_URL; ?>/home/g4.jpg" alt="Table Full of Spices" class="w-100 mb-2 mb-md-4 shadow-1-strong rounded explore_img" />
                            <img style="height: 164.18px" src="<?php echo $IMG_URL; ?>/home/g6.jpg" alt="Coconut with Strawberries" class="w-100 shadow-1-strong rounded explore_img" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <!-- ABOUT US SERVICES -->
        <div class="container" data-aos="zoom-in" data-aos-duration="">
            <div class="d-flex justify-content-between about_usService">
                <div class="box_support">
                    <img src="<?php echo $IMG_URL; ?>/home/delivery.png" width="50px" alt="" class="icon_support" />
                    <h5 class="tittle_support">MIỄN PHÍ GIAO HÀNG</h5>
                    <p class="support_desc">
                        Chúng tôi miễn phí giao hàng cho những đơn có tổng giá trị từ 1
                        triệu trở lên và trả lại hàng miễn phí tại trung tâm trả hàng của
                        chúng tôi tại TP.HCM. Các mặt hàng sẽ được gửi trong 1-2 ngày.
                    </p>
                </div>
                <div class="box_support">
                    <img src="<?php echo $IMG_URL; ?>/home/support.png" width="50px" alt="" class="icon_support" />
                    <h5 class="tittle_support">DỊCH VỤ KHÁCH HÀNG</h5>
                    <p class="support_desc">
                        Khi mua và sử dụng sản phẩm của chúng tôi, bạn sẽ được bộ phân
                        chăm sóc khách hàng hỗ trợ 24/24 nếu có bất cứ thắc mắc gì về sản
                        phẩm đã mua và đang sử dụng.
                    </p>
                </div>
                <div class="box_support">
                    <img src="<?php echo $IMG_URL; ?>/home/changes.png" width="50px" alt="" class="icon_support" />
                    <h5 class="tittle_support">CẬP NHẬT SẢN PHẨM</h5>
                    <p class="support_desc">
                        Khi đến với OCTOTECH, bạn sẽ được trải nghiệm những sản phẩm mới
                        nhất và chất lượng nhất trên thị trường, chúng tôi luôn quan tâm
                        tới khách hàng, đồng thời luôn mang đến cho khách hàng những trải
                        nghiệm tốt nhất và giải pháp tối ưu cho nhu cầu sử dụng.
                    </p>
                </div>
            </div>
        </div>
        <hr style="margin: 20px 20%" />
        <!-- FOOTER -->
        <?php
        include("$LAYOUT_URL/footer.php");

        ?>
    </div>
</body>

</html>