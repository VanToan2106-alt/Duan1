<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../css/sign-up/style.css" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@1,900&display=swap" rel="stylesheet" />
</head>

<body>
    <?php
    include('../global.php');
    include('../dao/pdo.php');
    include('../dao/users.php');
    ?>


    <div class="container-plus">
        <div class="sign-upForm">
            <img src="../images/home/logo-nav.png" width="200" alt="" class="logo" />
            <div class="text-header">
                <h3 class="text-welcome">Xin chào!</h3>
                <p class="please-enter">
                    Bạn vui lòng nhập đẩy đủ thông tin để tiến hành đăng ký nhé.
                </p>
            </div>
            <form method="post">

                <label for="">Nhập vào Email</label>
                <div class="email">
                    <input name="email" class="inp-email" type="email" placeholder="Enter your email" />
                </div>

                <label for="">Nhập vào mật khẩu</label>
                <div class="passworld">
                    <input name="password" class="inp-pass" type="password" placeholder="Enter your password" />
                </div>
                <label for="">Xác nhận mật khẩu</label>
                <div class="passworld">
                    <input style="width:100%" name="password2" class="inp-pass2" type="password" placeholder="Enter your password" />
                </div>
                <div>
                    <input class="btn-create" type="submit" name="register_account" id="" value="Create a Account">
                </div>

                <!-- <p class="success_regis" style="color: green; text-align:center;">Đăng ký thành công</p> -->

            </form>

            <div class="text-footer">
                <p>
                    Nếu bạn đã có tài khoản? Vui lòng
                    <strong><a href="<?= $ROOT_URL ?>/sign-in">Đăng nhập</a></strong>
                </p>
            </div>
        </div>
    </div>
    <style>
        .btn-create {
            color: white;
            border: none;
            transition: 0.5s;
        }

        .btn-create:hover {
            opacity: 0.8;
        }
    </style>
</body>
<?php
if (isset($_POST['register_account']) && $_POST['register_account']) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($password == $password2) {
        user_register($email, $password);
        $mess = "Bạn đã đăng ký thành công.";
        $mess2 = "Hệ thống sẽ chuyển đến trang đăng nhập";
        $style = "green";
        $img = "happy.jpg";
        $success_login = 'sign-in/sign-in.php';
        include "./popup.php";
    }
    if ($password != $password2) {
        $mess = "Mật khẩu xác nhận không khớp.";
        $mess2 = " Vui lòng thử lại.";
        $style = "red";
        $img = "angry.jpg";
        $success_login = 'sign-up/sign-up.php';
        include './popup.php';
    }

    // $registration_success = true;
    // echo "<script type='text/javascript'>alert('Đăng ký thành công, bạn có thể đăng nhập');</script>";
    // echo "<meta http-equiv='refresh' content='0;URL=$ROOT_URL/sign-in/sign-in.php'>";
    // echo "<script>alert('Đăng ký thành công');</script>";
    // header("location: $ROOT_URL/sign-in/sign-in.php");

}

?>
<?php
echo "
<script language='javascript'>
    const btn = document.querySelector('.btn-create');
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        const pass1 = document.querySelector('.inp-pass').value;
        const pass2 = document.querySelector('.inp-pass2').value;
        const popup = document.querySelector('.popup__alert');

        if (pass1 != pass2) {
            // popup.style.display = 'flex'; // Hiển thị popup
            // setTimeout(function() {
            //     popup.style.display = 'none'; // Tự động ẩn sau 3 giây
            // }, 3000);
                   include './popup.php';

        }
    });
</script>";
?>

</html>