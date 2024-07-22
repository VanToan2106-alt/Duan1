<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/reset.css" />
  <link rel="stylesheet" href="../css/sign-in/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,900&display=swap" rel="stylesheet">
</head>

<body>
  <?php
  include('../global.php');
  include('../dao/pdo.php');
  include('../dao/users.php');
  include '../PHPMailer/src/Exception.php';
  include '../PHPMailer/src/PHPMailer.php';
  include '../PHPMailer/src/SMTP.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;
  ?>
  <div class="container-plus">
    <div class="box-logIn">
      <div class="log-inForm">
        <a href="<?= $ROOT_URL ?>"> <img src="../images/home/logo-nav.png" width="200px" alt="" class="logo" /></a>

        <div class="topText">
          <h3 class="text_welcome">Vui lòng nhập email của bạn</h3>
          <p class="please_enter">
            Vui lòng đúng email mà bạn đã đăng ký, chúng tôi sẽ hỗ trợ bạn lấy lại mật khẩu!
          </p>
        </div>
        <form method="post">
          <div class="email">
            <input class="input-mail" type="email" name="email" placeholder="Enter your email" />
            <div class="icon_wrapMail">
              <i class="fa-solid fa-envelope mail_icon"></i>
            </div>
          </div>

          <?php
          if (isset($_POST['seen_mail']) && $_POST['seen_mail']) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              echo "<p style='color: red;'>Địa chỉ email không có thực!</p>";
            } else {
              $check = check_email($_POST['email']);
              if (is_array($check)) {
                $token = "magnesi";
                $encryptionKey = "laptopstoreoctotechtachnology";
                $iv = random_bytes(16);
                $encryptedToken = openssl_encrypt($token, 'AES-256-CBC', $encryptionKey, 0, $iv);
                $_SESSION['encrypted_token'] = $encryptedToken;
                $_SESSION['iv'] = $iv;
                $_SESSION['email_request'] = $check['email'];
                $_SESSION['user_request'] = $check['id_user'];
                $resetLink = $HOST_NAME . $ROOT_URL . '/recover-password/reset_password.php?token=' . urlencode(base64_encode($encryptedToken));
                // echo 'Password reset link sent to the user: <a href="' . $resetLink . '"> Reset Now</a>';
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
                  $mail->addAddress($email);
                  $mail->isHTML(true);
                  $mail->Subject = 'Yêu cầu khôi phục mật khẩu tại website Octotech Technology';
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
                          <p>Yêu cầu khôi phục mật khẩu</p>
                        </div>
                        <div style="padding: 10px 40px;
                          color: #787878;font-size: 18px;">
                          <p>Xin chào bạn. Tôi là <strong>Admin Octotech Technology</strong></p>
                          <p>Ai đó đã yêu cầu mật khẩu mới cho tài khoản sau tại website Octotech</p>
                          <p>Tên đăng nhập: <strong>' . $check['email'] . '</strong></p>
                          <p>
                            Nếu bạn không tạo yêu cầu này, hãy bỏ qua email. Nếu muốn thực hiện
                          </p>
                          <a href="' . $resetLink . '">Ấn vào đây để lấy lại mật khẩu</a>
                          <p>Thanks for reading.</p>
                        </div>
                      </div>
                    </div>
                    <div style="text-align: center;color: #787878;font-size: 18px;">@2023 Present - <strong style="color: #4d1ab8;">OCTOTECH</strong></div>
                  </div>
                  
                  ';
                  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                  $mail->SMTPOptions = array(
                    'ssl' => array(
                      'verify_peer' => false,
                      'verify_peer_name' => false,
                      'allow_self_signed' => true
                    )
                  );
                  $mail->send();
                  echo "<p style='color: green;'>Gửi thông tin thành công!</p>";
                } catch (Exception $e) {
                  echo "<p style='color: red;'>Thông tin gửi đi thất bại!</p>";
                }
              } else {
                echo "<p style='color: red;'>" . $check . "</p>";
              }
            }
          }
          ?>


          <input class="button-logIn" style="color: white; text-transform: uppercase;" type="submit" name="seen_mail" value="Gửi thông tin">

        </form>
        <div class="click-signUp">
          <p>Nếu bạn chưa có tài khoản? Vui lòng <a href="<?= $ROOT_URL ?>/sign-up/sign-up.php">Đăng ký</a>
          </p>
        </div>
      </div>
    </div>
  </div>


</body>
<script>
  window.addEventListener('load', function(e) {
    const icon = document.querySelector('.pass_icon');
    icon.addEventListener('click', function(e) {
      const pass = document.querySelector('.inp-pass');
      const warning = document.querySelector('.warning-pass');
      if (pass.value == '') {
        icon.classList.add('fa-lock');
        warning.style.display = 'block';
      } else if (pass.type === 'password') {
        warning.style.display = 'none';
        pass.type = 'text';
        pass.style.width = '100%';
        pass.style.marginTop = '15px';
        icon.classList.toggle('fa-unlock');
        icon.classList.toggle('fa-lock');
      } else {
        pass.type = 'password';
        icon.classList.toggle('fa-unlock');
        icon.classList.toggle('fa-lock');
      }
    });
  });
</script>

</html>