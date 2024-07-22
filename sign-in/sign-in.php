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

    ?>
    <div class="container-plus">
        <div class="box-logIn">
            <div class="log-inForm">
                <a href="<?= $ROOT_URL ?>"> <img src="../images/home/logo-nav.png" width="200px" alt="" class="logo" /></a>

                <div class="topText">
                    <h3 class="text_welcome">Chào mừng quay trở lại!</h3>
                    <p class="please_enter">
                        Vui lòng nhập đầy đủ thông tin phía dưới để tiến hành đăng nhập!
                    </p>
                </div>
                <form action="<?= $ROOT_URL ?>/sign-in/index.php" method="post">
                    <div class="email">
                        <input class="input-mail" type="email" name="email" placeholder="Enter your email" />
                        <div class="icon_wrapMail">
                            <i class="fa-solid fa-envelope mail_icon"></i>
                        </div>
                    </div>
                    <div class="password">
                        <input class="inp-pass" type="password" name="password" placeholder="Enter your password" />
                        <div class="icon_wrapPass">
                            <i class="fa-solid fa-lock pass_icon"></i>
                        </div>
                    </div>

                    <p class="warning-pass">Vui lòng nhập mật khẩu để sử dụng chức năng</p>

                    <div class="support-logIn">
                        <div class="remember">
                            <p>
                                <input type="checkbox" name="remember" id="">
                            <p class="remember_Text">Ghi nhớ tài khoản</p>
                            </p>
                        </div>
                        <div class="forgot">
                            <a href="../recover-password/recover.php">Quên mật khẩu?</a>
                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['err'])) {
                    ?>
                        <p style="color: red;"><?= $_SESSION['err'] ?></p>
                    <?php
                    } ?>

                    <input class="button-logIn" style="color: white; text-transform: uppercase;" type="submit" name="login" value="Đăng nhập">

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