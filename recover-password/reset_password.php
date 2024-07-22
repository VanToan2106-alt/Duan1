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

    $encryptedToken = base64_decode($_GET['token']);
    if (isset($_SESSION['encrypted_token']) && isset($_SESSION['iv'])) {
        $iv = $_SESSION['iv'];
        $encryptionKey = "laptopstoreoctotechtachnology";
        $decryptedToken = openssl_decrypt($encryptedToken, 'AES-256-CBC', $encryptionKey, 0, $iv);
    }
    ?>
    <div class="container-plus">
        <div class="box-logIn">
            <div class="log-inForm">
                <a href="<?= $ROOT_URL ?>"> <img src="../images/home/logo-nav.png" width="200px" alt="" class="logo" /></a>

                <div class="topText">
                    <h3 class="text_welcome">Hãy nhập lại mật khẩu</h3>
                    <p class="please_enter">
                        Hãy đảm bảo rằng bạn click đúng đường link được gửi qua email, để được thay đổi mật khẩu!
                    </p>
                </div>
                <form method="post">
                    <div class="pass">
                        <input type="hidden" name="token" value="<?= htmlentities($decryptedToken) ?>">
                        <input class="inp-pass" type="password" name="password" placeholder="Nhập mật khẩu mới" />
                        <input class="inp-pass" type="password" name="password2" placeholder="Nhập lại mật khẩu" />

                    </div>
                    <?php
                    if (isset($_POST['reset_pass']) && $_POST['reset_pass']) {
                        $submittedToken = $_POST['token'];
                        $newPassword = $_POST['password'];
                        if ($newPassword != $_POST['password2']) {
                            echo "<p style='color: red;'>Mật khẩu không trùng khớp!</p>";
                        } else {
                            if (isset($decryptedToken) && $submittedToken === $decryptedToken) {
                                try {
                                    users_change_password($_SESSION['user_request'], $_SESSION['email_request'], $newPassword);
                                    echo "
                                    <p style='color: green;'>Đổi mật khẩu thành công!</p>
                                    <script>
                                    const myTimeout = setTimeout(Render, 1000);
                                    function Render() {
                                        window.location.href = '../sign-in/index.php';
                                    }
                                    myTimeout;
                                    </script>
                                    ";
                                    unset($_SESSION['user_request']);
                                    unset($_SESSION['email_request']);
                                } catch (Exception $e) {
                                    echo "<p style='color: red;'>Đổi mật khẩu thất bại. Vui lòng gửi một yêu cầu khác!</p>";
                                } finally {
                                    unset($_SESSION['encrypted_token']);
                                    unset($_SESSION['iv']);
                                }
                            } else {
                                echo "<p style='color: red;'>Hãy đảm bảo rằng bạn click đúng đường link được gửi qua email!</p>";
                            }
                        }
                    }
                    ?>



                    <input class="button-logIn" style="color: white; text-transform: uppercase;" type="submit" name="reset_pass" value="Đặt lại mật khẩu">

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