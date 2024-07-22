<!DOCTYPE html>
<html lang="en">

<head>
    <?php
  include('../global.php');
  ?>
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
    <style>
    p {
        line-height: 30px;
        font-family: "Poppins", sans-serif;
    }

    .btn {
        position: relative;
        font-size: 17px;
        text-transform: uppercase;
        text-decoration: none;
        padding: 0.5em 2em;
        display: inline-block;
        border-radius: 6em;
        transition: all 0.2s;
        border: none;
        font-family: inherit;
        font-weight: 500;
        color: black;
        background-color: rgb(217, 217, 217);
    }

    .btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    .btn:active {
        transform: translateY(-1px);
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    }

    .btn::after {
        content: "";
        display: inline-block;
        height: 100%;
        width: 100%;
        border-radius: 100px;
        position: absolute;
        top: 0;
        left: 0;
        z-index: -1;
        transition: all 0.4s;
    }

    .btn::after {
        background-color: #fff;
    }

    .btn:hover::after {
        transform: scaleX(1.4) scaleY(1.6);
        opacity: 0;
    }

    .title-about-us {
        background-image: url(../images/about-us/background.png);
        background-size: cover;
        width: 100%;
        height: 550px;
    }

    .title {
        color: #000;
        margin-top: 225px;
    }

    .paragraph h6 {
        color: #000;
        font-size: 18px;
    }

    .story-img img {
        width: 200px;
        height: 200px;
    }

    .title-our-story {
        background-color: #fafafa;
    }

    .title-story {
        margin-top: 20px;
    }

    .story-img img {
        width: 500px;
        height: 500px;
        margin-left: 50px;
    }

    .text-story {
        margin-top: 10%;
        font-size: 18px;
    }

    .text-story p {
        font-style: italic;
    }

    .about-us-part3 {
        width: 100%;
        height: 650px;
    }

    .title-misson {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .misson-inf {
        background-color: #dbd2ff;
        width: 100%;
        height: 225px;
        padding: 20px;
        padding-top: 30px;
        margin: 10px;
        border-radius: 15px;
    }

    .icon-mission-inf img {
        width: 50px;
        position: relative;
        top: 30px;
        left: 5%;
    }

    .produce-our-team {
        width: 100%;
        /* height: 400px; */
        background-color: #fafafa;
        padding-bottom: 20px;
    }

    .title-produce {
        margin-top: 20px;
    }

    .member-inf {
        margin-top: 20px;
        margin-bottom: 20px;
    }

    .member-inf h5 {
        text-align: center;
        margin-top: 20px;
    }

    .member-inf p {
        text-align: center;
        color: #7B8FA1;
    }

    .member-inf img {
        width: 200px;
        height: 200px;
        border-radius: 100px;
        margin-left: 20px;
    }

    @media (max-width: 800px) {
        p {
            line-height: 30px;
        }

        body {
            width: 100%;
            display: flex;
            flex-direction: column;
        }

        .title-about-us {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background-image: url(../images/about-us/background.png);
            background-size: cover;
        }

        .title-story {
            text-align: center;
        }

        .btn-main {
            text-align: center;
        }

        .story-img img {
            width: 100%;
            height: auto;
            margin-left: 50%;
        }

        .title-misson {
            margin-top: 20px;
            text-align: center;
        }

        .about-us-part3 {
            width: 100%;
        }

        .about_main {
            width: 100%;
        }

        .about_mission {
            /* width: 100%; */
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .misson-inf {
            display: flex;
            flex-direction: column;
            width: 100%;
            height: auto;
            margin: 0;
        }

        .produce-our-team {
            /* height: auto; */
            margin-top: 800px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .member-inf {
            display: flex;
            align-items: center;
        }

        .member-inf h5 {
            font-size: 16px;
            margin-left: 20px;
        }

        .view-btn {
            text-align: center;
        }
    }
    </style>
</head>

<body>
    <?php
  include("../layouts/header.php");
  ?>
    <section class="title-about-us">
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <div class="title">
                        <h1>About us</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <div class="paragraph">
                        <h6>Chào mừng bạn đến với Octotech!</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="title-our-story">
        <div class="container">
            <div class="row">
                <div class="row justify-content-md-center" data-aos="fade-up" data-aos-duration="2000">
                    <div class="col-md-auto">
                        <div class="title-story">
                            <h1>Our Story</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm" data-aos="fade-down-right">
                    <div class="text-story">
                        <p>
                            Chúng tôi bắt đầu từ một đam mê chung về công nghệ và sự hiểu
                            biết về vai trò quan trọng của laptop trong cuộc sống hiện đại.
                            Được truyền cảm hứng bởi sự phát triển không ngừng của công nghệ
                            và sự thay đổi trong nhu cầu của người tiêu dùng, chúng tôi
                            quyết định tạo nên một không gian mua sắm đáng tin cậy và tuyệt
                            vời cho những ai đang tìm kiếm một chiếc laptop tốt nhất cho
                            mình. <br /><br />
                            Với sứ mệnh mang đến những giải pháp công nghệ chất lượng cao,
                            chúng tôi thành lập shop bán laptop với tầm nhìn trở thành điểm
                            đến tin cậy và lựa chọn hàng đầu cho mọi người khi có nhu cầu
                            mua sắm laptop. Chúng tôi hiểu rằng laptop không chỉ là một công
                            cụ làm việc, giải trí hay chơi game mà còn là một phần quan
                            trọng của cuộc sống hàng ngày, đóng vai trò trong việc kết nối,
                            sáng tạo và khám phá thế giới xung quanh chúng ta.
                        </p>
                    </div>
                    <div class="btn-main">
                        <button class="btn">More</button>
                    </div>
                </div>
                <div class="col" data-aos="zoom-out-down">
                    <div class="row">
                        <div class="col-md-auto">
                            <div class="story-img">
                                <img src="../images/about-us/hình 1.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about-us-part3">
        <div class="container">
            <div class="row justify-content-md-center" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-md-auto">
                    <div class="title-misson">
                        <h1>Why choose us</h1>
                    </div>
                    <div class="row about_mission">
                        <div class="col-6 about_main" data-aos="fade-right">
                            <div class="icon-mission-inf">
                                <img src="../images/about-us/icons8-approval-100.png" alt="" />
                            </div>
                            <div class="misson-inf">
                                <h4>Cung cấp sản phẩm chất lượng</h4>
                                <p>
                                    Chúng tôi cam kết mang đến cho khách hàng những sản phẩm
                                    laptop chất lượng cao từ các thương hiệu uy tín và đáng tin
                                    cậy. Chúng tôi lựa chọn kỹ lưỡng để đảm bảo rằng mỗi sản
                                    phẩm đáp ứng được tiêu chuẩn cao về hiệu suất, thiết kế và
                                    độ bền.
                                </p>
                            </div>
                        </div>
                        <div class="col-6 about_main" data-aos="fade-left">
                            <div class="icon-mission-inf">
                                <img src="../images/about-us/icons8-small-business-100.png" alt="" />
                            </div>
                            <div class="misson-inf">
                                <h4>Đa dạng và phong phú</h4>
                                <p>
                                    Chúng tôi hiểu rằng mỗi khách hàng có nhu cầu và ưu tiên
                                    riêng. Vì vậy, chúng tôi tập trung vào việc cung cấp một
                                    danh mục đa dạng và phong phú của các dòng laptop, từ các
                                    model công việc đến giải trí và gaming. Điều này giúp khách
                                    hàng tìm thấy sản phẩm phù hợp với nhu cầu và ngân sách của
                                    mình.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row about_mission">
                        <div class="col-6 about_main" data-aos="fade-right">
                            <div class="icon-mission-inf">
                                <img src="../images/about-us/icons8-trust-100.png" alt="" />
                            </div>
                            <div class="misson-inf">
                                <h4>Dịch vụ chuyên nghiệp</h4>
                                <p>
                                    Đội ngũ nhân viên tận tâm và chuyên nghiệp của chúng tôi
                                    luôn sẵn sàng hỗ trợ và tư vấn khách hàng trong quá trình
                                    mua sắm. Chúng tôi đặt khách hàng lên hàng đầu và đảm bảo
                                    rằng họ nhận được sự hỗ trợ tận tâm, thông tin chi tiết về
                                    sản phẩm và giải đáp mọi câu hỏi một cách nhanh chóng và chu
                                    đáo.
                                </p>
                            </div>
                        </div>
                        <div class="col-6 about_main" data-aos="fade-left">
                            <div class="icon-mission-inf">
                                <img src="../images/about-us/icons8-profit-100.png" alt="" />
                            </div>
                            <div class="misson-inf">
                                <h4>Giá cả cạnh tranh</h4>
                                <p>
                                    Chúng tôi cam kết cung cấp sản phẩm với giá cả cạnh tranh và
                                    hợp lý. Chúng tôi đảm bảo rằng khách hàng sẽ nhận được giá
                                    trị tốt nhất cho số tiền mà họ chi trả.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="produce-our-team">
        <div class="row justify-content-md-center" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-md-auto">
                <div class="title-produce">
                    <h1>Meet Our Members</h1>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm" data-aos="flip-left">
                    <div class="member-inf">
                        <img src="../images/about-us/captian.jpg" alt="" />
                        <h5>Văn Toàn</h5>
                        <p>Co-leader</p>
                    </div>
                </div>
                <div class="col-sm" data-aos="flip-left">
                    <div class="member-inf">
                        <img src="../images/about-us/wonder women.jpg" alt="" />
                        <h5>Công Phi</h5>
                        <p>Leader</p>
                    </div>
                </div>
                <div class="col-sm" data-aos="flip-left">
                    <div class="member-inf">
                        <img src="../images/about-us/iron.jpg" alt="" />
                        <h5>Đình Huy</h5>
                        <p>Member</p>
                    </div>
                </div>
                <div class="col-sm" data-aos="flip-left">
                    <div class="member-inf">
                        <img src="../images/about-us/hulk.jpg" alt="" />
                        <h5>Tuấn Dương</h5>
                        <p>Member</p>
                    </div>
                </div>
                <!-- <div class="col-sm" data-aos="flip-left">
                    <div class="member-inf">
                        <img src="../images/about-us/spider.jpg" alt="" />
                        <h5>Huỳnh Đức Thắng</h5>
                        <p>Member</p>
                    </div>
                </div> -->
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <div class="view-btn">
                        <button class="btn">View the team</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php
  include("../layouts/footer.php");
  ?>
</body>
<script>
AOS.init({
    easing: "ease-in-out-sine",
});