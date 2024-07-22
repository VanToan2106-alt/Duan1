 <!-- MENU -->
 <div class="d-flex justify-content-around align-items-center menu">
     <div class="nav-logo">
         <!-- Image and text -->
         <nav class="navbar navbar-light">
             <a class="navbar-brand" href="<?= $ROOT_URL ?>">
                 <img src="<?php echo $IMG_URL; ?>/home/logo_fixed.png" width="150" class="d-inline-block align-top logo_img" alt="" />
             </a>

             <div class="nav-list">
                 <nav class="navbar navbar-expand-lg navbar-light">
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                         <div class="collapse navbar-collapse" id="navbarText">
                             <ul class="navbar-nav mr-auto">
                                 <li class="nav-item">
                                     <a class="nav-link" href="../home/index.php">Trang chủ</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="../shop/index.php">Cửa hàng</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="../about-us/index.php">Về chúng tôi</a>
                                 </li>
                                 <li class="nav-item">
                                     <a class="nav-link" href="../contact/contact.php">Liên hệ</a>
                                 </li>
                                 <?php
                                    $id_customer_order = get_cookie('id_customer_order');

                                    if ($id_customer_order != '' && !isset($_SESSION['user'])) {
                                    ?>
                                     <li class="nav-item">
                                         <a class="nav-link" href="../customer-manage/index.php">Lịch sử mua hàng</a>
                                     </li>
                                 <?php
                                    }
                                    ?>

                             </ul>
                         </div>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarText">
                         <ul class="navbar-nav mr-auto">
                             <li class="nav-item">
                                 <a class="nav-link" href="../home/index.php">Trang chủ</a>

                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="../shop/index.php">Cửa hàng</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="../about-us/index.php">Về chúng tôi</a>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="../contact/contact.php">Liên hệ</a>
                             </li>
                             <?php
                                $id_customer_order = get_cookie('id_customer_order');
                                if ($id_customer_order != '' && !isset($_SESSION['user'])) {
                                ?>
                                 <li class="nav-item">
                                     <a class="nav-link" href="../customer-manage/index.php">Lịch sử mua hàng</a>
                                 </li>
                             <?php
                                }
                                ?>
                         </ul>
                     </div>
                 </nav>
             </div>
         </nav>
     </div>

     <div class="nav-language">
         <nav class="navbar navbar-expand-lg navbar-light">
             <div class="collapse navbar-collapse" id="navbarText">
                 <ul class="navbar-nav d-flex align-items-center mr-auto nav-lang">
                     <?php
                        if (isset($_SESSION["user"])) {
                        ?>
                         <li class="nav-item language-main">
                             <a class="nav-link" href="<?= $ROOT_URL ?>/sign-in/index.php?logout">Đăng Xuất</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="<?= $ROOT_URL ?>/users-manage/index.php">
                                 <div class=" controller_user d-flex align-items-center">
                                     <span style="text-transform: capitalize;"><?= $_SESSION["user"]['email'] ?></span>
                                 </div>
                             </a>
                         </li>

                     <?php
                        } else {
                        ?>
                         <li class="nav-item language-main">
                             <a class="nav-link" href="<?= $ROOT_URL ?>/sign-in">Đăng nhập</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="<?= $ROOT_URL ?>/sign-up/sign-up.php">Đăng kí</a>

                         </li>
                     <?php
                        }
                        ?>
                 </ul>
             </div>
         </nav>
     </div>
 </div>