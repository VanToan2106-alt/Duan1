<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CONTACT</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- ICON LINK -->
  <link rel="icon" href="../image/home/logo-nav.png" type="image/x-icon" />
  <link rel="stylesheet" href="/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/css/style.css" />
  <link rel="stylesheet" href="/css/reset.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  <!-- ICON LINK -->
  <link rel="icon" href="/images/contact/logo-nav.png" type="image/x-icon" />
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
  <!-- header -->
  <?php
  include('../global.php');
  include '../PHPMailer/src/Exception.php';
  include '../PHPMailer/src/PHPMailer.php';
  include '../PHPMailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  ?>
</head>

<body>
  <div class="container-plus">
    <!-- MENU -->
    <!-- header -->
    <?php
    include('../layouts/header.php');
    ?>
    <!-- <div class="text-center text-about">
      <p>Contact</p>
    </div> -->
    <!-- TEXT ABOUT -->

    <style>
      .form {
        text-align: center;
        margin-top: 100px;
        margin-bottom: 100px;
      }

      h1 {
        color: #bd59d4;
        padding: 100px;
      }

      #form1 {
        width: 50%;
        background: #fff;
        margin: 0 auto;
      }

      #form1 input[type=text] {
        width: 100%;
        box-sizing: border-box;
        font-size: 18px;
        color: #555;
        display: block;
        line-height: 1.2;
        background-color: #fff;
        border-radius: 20px;
        margin-bottom: 10px;
        height: 50px;
        padding: 0 20px 0 23px;
        border: 0;
        box-shadow: 0 5px 20px 0 rgb(0 0 0 / 5%);
        -moz-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .05);
        -webkit-box-shadow: 0 5px 20px 0 rgb(0 0 0 / 5%);
        -o-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .05);
        -ms-box-shadow: 0 5px 20px 0 rgba(0, 0, 0, .05);
      }

      #form1 input[type=text]:focus {
        border: 0;
        outline: none;
        box-shadow: 0 5px 20px 0 rgb(250 66 81 / 10%);
        -moz-box-shadow: 0 5px 20px 0 rgba(250, 66, 81, .1);
        -webkit-box-shadow: 0 5px 20px 0 rgb(250 66 81 / 10%);
        -o-box-shadow: 0 5px 20px 0 rgba(250, 66, 81, .1);
        -ms-box-shadow: 0 5px 20px 0 rgba(250, 66, 81, .1);
      }

      #form1 #content {
        outline: none;
        min-height: 150px;
      }

      #form1 input[type=submit] {
        background-color: #bd59d4;
        height: 42px;
        padding: 5px 20px;
        border-radius: 21px;
        font-size: 14px;
        text-transform: uppercase;
        color: #fff;
        border: 0;
        box-shadow: 0 10px 30px 0 rgb(189 89 212 / 50%);
        -moz-box-shadow: 0 10px 30px 0 rgba(189, 89, 212, .5);
        -webkit-box-shadow: 0 10px 30px 0 rgb(189 89 212 / 50%);
        -o-box-shadow: 0 10px 30px 0 rgba(189, 89, 212, .5);
        -ms-box-shadow: 0 10px 30px 0 rgba(189, 89, 212, .5);
      }

      #form1 input[type="submit"]:hover {
        background: #CC4949;
      }
    </style>
    <script src="../js/contact.js"></script>
    </head>

    <body>
      <div class="form">
        <h1>LIÊN HỆ VỚI CHÚNG TÔI</h1>
        <form action="" method="post" id="form1">
          <input type="text" id="name" name="name" placeholder="Họ tên*" required><br>
          <input type="text" id="email" name="email" placeholder="Địa chỉ Email*" required><br>
          <input type="text" id="phone" name="phone" placeholder="Số điện thoại"><br>
          <input type="text" id="content" name="content" placeholder="Nội dung*" required><br>
          <input name="seen_mail_contact" type="submit" value="Gửi yêu cầu">
          <?php
          if (isset($_POST['seen_mail_contact']) && $_POST['seen_mail_contact']) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $name = $_POST['name'];
            $phone = $_POST['phone'];
            $content = $_POST['content'];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo "<p style='color: red;'>Địa chỉ email không có thực!</p>";
            } else {
              $mail = new PHPMailer(true);
              try {
                // Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->CharSet = "utf-8";
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'keyboardshop.store@gmail.com';
                $mail->Password   = 'kflplbxylimmjvgt';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;
                $mail->setFrom('keyboardshop.store@gmail.com', 'Octotech Technology');
                $mail->addAddress('keyboardshop.store@gmail.com', 'Admin');
                $mail->isHTML(true);
                $mail->Subject = 'Yêu cầu liên hệ của khách hàng tại website Octotech Technology';
                $mail->Body    = '
                  <div style="margin-top: 10%;
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;
                    
                    <div style="
                        box-shadow: rgba(0, 0, 0, 0.8) 0px 1px 4px;
                        border: none;
                      ">
                      <div style=" width: 70%;margin: 0px auto;">
                        <div style=" padding: 10px 40px;
                          background-color: #4d1ab8;
                          color: white;
                          font-weight: bold; font-size: 28px;">
                          <p>Yêu cầu liên hệ của khách hàng</p>
                        </div>
                        <div style="padding: 10px 40px;
                          color: #787878;font-size: 18px;">
                          <p>Họ và tên khách hàng: <strong>' . $name . '</strong></p>
                          <p>Email khách hàng: <strong>' . $email . '</strong></p>
                          <p>Số điện thoại khách hàng: <strong>' . $phone . '</strong></p>
                          <p>Nội dung:</p>
                          <p>' . $content . '</p>
                          <p>
                            Hãy trả lời yêu cầu của khách hàng sớm nhất!
                          </p>
                        </div>
                      </div>
                    </div>
                    <div style="text-align: center;color: #787878;font-size: 18px;">@2023 Present - <strong style="color: #4d1ab8;">OCTOTECH</strong></div>
                  </div>
                  
                  ';
                $mail->SMTPOptions = array(
                  'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                  )
                );
                $mail->send();
                echo "<h4 style='text-align: left;color: green;'>Gửi thông tin thành công!</h4>";
              } catch (Exception $e) {
                echo "<h4 style='text-align: left;color: red;'>Thông tin gửi đi thất bại!</h4>";
              }
            }
          }
          ?>
        </form>

      </div>

      <iframe style=" margin-bottom: 20px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7836.959918351722!2d106.61871919177815!3d10.851052594246935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175290c3e61af89%3A0xc6da6b0f132ec62c!2zQ2FvIMSQ4bqzbmcgRlBUIC0gR2nhuqNuZyDEkMaw4budbmc!5e0!3m2!1svi!2s!4v1688132762734!5m2!1svi!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


      <!-- FOOTER -->
      <?php
      include('../layouts/footer.php');
      ?>
  </div>
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
    window.scrollTo(0, 200)
  </script>
</body>

</html>