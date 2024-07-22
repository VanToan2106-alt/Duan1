         <div class="side-bar">
             <div class="header-sideBar">
                 <a href="<?= $ROOT_URL ?>/admin"> <img src="<?= $IMG_URL ?>/home/logo_fixed.png" width="150px" alt="" />
                 </a>
             </div>
             <div class="text-control">
                 <i class="fa-solid fa-wrench"></i>
                 <p>Danh mục quản lý</p>
             </div>
             <div class="content-sideBar">
                 <ul class="sideBar-list">
                     <style>
                         .list_nav {
                             position: relative;
                         }

                         .new_bill {
                             position: absolute;
                             top: -10px;
                             left: 100%;
                             color: red;
                             font-size: 16px;
                             border: 2px solid red;
                             padding: 10px 5px;
                             border-radius: 50%;

                         }
                     </style>
                     <li class="d-flex flex-row-reverse justify-content-center">
                         <a class="list_nav" href="<?= $ROOT_URL ?>/admin/bills">Đơn hàng <?php
                                                                                            $countNew = get_new_bills();
                                                                                            if ($countNew['count_new_bills']>0) {
                                                                                            ?><sup class="new_bill"><?= $countNew['count_new_bills'] ?></sup>
                             <?php
                                                                                            } ?></a>
                         <i class="fa-sharp fa-solid fa-file-invoice-dollar icon_side"></i>
                     </li>
                     <li class="d-flex flex-row-reverse justify-content-center">
                         <a class="list_nav" href="<?= $ROOT_URL ?>/admin/categories/new.php">Loại hàng</a>
                         <i class="fa-solid fa-list icon_side"></i>
                     </li>
                     <li class="d-flex flex-row-reverse justify-content-center">
                         <a class="list_nav" href="<?= $ROOT_URL ?>/admin/product/new.php">Sản phẩm</a>
                         <i class="fa-sharp fa-solid fa-box icon_side"></i>
                     </li>
                     <li class="d-flex flex-row-reverse justify-content-center">
                         <a class="list_nav" href="<?= $ROOT_URL ?>/admin/account">Tài khoản</a>
                         <i class="fa-solid fa-users icon_side"></i>
                     </li>
                     <li class="d-flex flex-row-reverse justify-content-center">
                         <a class="list_nav" href="<?= $ROOT_URL ?>/admin/comment/cmt.php">Bình luận</a>
                         <i class="fa-sharp fa-solid fa-comments icon_side"></i>
                     </li>
                 </ul>
             </div>
             <div class="log-out">
                 <p>
                     <i class="fa-solid fa-right-from-bracket"></i>
                     <a href="<?= $ROOT_URL ?>">Quay lại trang web</a>
                 </p>
             </div>
         </div>
         <style>
             .list_nav:hover+.icon_side {
                 transform: scale(2);
                 transition: 0.5s;
             }
         </style>
         <!-- <script>
             window.addEventListener("load", function(e) {
                 const lis = document.querySelectorAll(".list_nav");
                 lis.forEach((item) => {
                     const icon = item.querySelector(".icon_side");
                     item.addEventListener("mouseenter", function(e) {
                         icon.style.transition = "0.5s";
                         icon.style.transform = "scale(2)";
                     });
                     item.addEventListener("mouseleave", function(e) {
                         icon.style = "";
                     });
                 });
             });
         </script> -->