 <?php
    // Tìm số lượng khách hàng
    $total_customers = count_customers();
    if ($total_customers !== false) {
        $count_customers = $total_customers[0]['total_customers'];
    } else {
        echo "<h1>Không có khách hàng.</h1>";
    }
    // Tìm số lượng staff
    $total_staffs = count_staffs();
    if ($total_staffs !== false) {
        $count_staffs = $total_staffs[0]['total_customers'];
    } else {
        echo "<h1>Không có khách hàng.</h1>";
    }

    // Tím số lượng admin
    $total_admin = count_admin();
    if ($total_admin !== false) {
        $count_admin = $total_admin[0]['total_customers'];
    } else {
        echo "<h1>Không có khách hàng.</h1>";
    }

    ?>

 <div style="background-color: #F0F0F0;" class="tittle_listUsers">
     <h3 style="color: black;">Thông tin tài khoản của OCTOTECH</h3>
     <i style="margin-left: 50px; color:black;" class="fa-sharp fa-solid fa-circle-info"></i>
 </div>
 <div class="main_listUsers">
     <a href="./index.php?customer">
         <div class="box_listUser">
             <div class="text_boxlistUser">
                 <p>Tài khoản người dùng</p>
                 <p>Số lượng: <strong><?php echo "$count_customers" ?></strong></p>
             </div>
             <div class="img_boxlistUser">
                 <i class="fa-solid fa-users"></i>
             </div>
         </div>
     </a>
     <a href="./index.php?staff">
         <div class="box_listUser">
             <div class="text_boxlistUser">
                 <p>Tài khoản nhân viên</p>
                 <p>Số lượng: <strong><?php echo "$count_staffs" ?></strong></p>
             </div>
             <div class="img_boxlistUser">
                 <i class="fa-solid fa-user-tie"></i>
             </div>
         </div>
     </a>
     <a href="./index.php?admin">
         <div class="box_listUser">
             <div class="text_boxlistUser">
                 <p>Tài khoản quản trị viên</p>
                 <p>Số lượng: <strong><?php echo "$count_admin" ?></strong></p>
             </div>
             <div class="img_boxlistUser">
                 <i class="fa-sharp fa-solid fa-user-secret"></i>
             </div>
         </div>
     </a>
 </div>