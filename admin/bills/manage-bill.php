 <?php
    // Tìm số lượng khách hàng
    // $total_customers = count_customers();
    // if ($total_customers !== false) {
    //     $count_customers = $total_customers[0]['total_customers'];
    // } else {
    //     echo "<h1>Không có khách hàng.</h1>";
    // }
    // // Tìm số lượng staff
    // $total_staffs = count_staffs();
    // if ($total_staffs !== false) {
    //     $count_staffs = $total_staffs[0]['total_customers'];
    // } else {
    //     echo "<h1>Không có khách hàng.</h1>";
    // }

    // // Tím số lượng admin
    // $total_admin = count_admin();
    // if ($total_admin !== false) {
    //     $count_admin = $total_admin[0]['total_customers'];
    // } else {
    //     echo "<h1>Không có khách hàng.</h1>";
    // }

    ?>

 <div style=" background-color: #F0F0F0" class="tittle_listUsers">
     <h3 style="color: black">Thông tin các đơn hàng</h3>
     <i style="margin-left: 50px; color:black" class="fa-sharp fa-solid fa-circle-info"></i>
 </div>
 <div class="main_listUsers">
     <?php
        foreach ($arrStatus as $key => $bill) {
            $count_bill = count_status_bills($key);
        ?>
         <a href="./index.php?status=<?= $key ?>">
             <div class="box_listUser">
                 <div class="text_boxlistUser">
                     <p class="name_bill"><?= $bill ?></p>
                     <p>Số lượng: <strong><?= $count_bill['count_bills'] ?></strong></p>
                 </div>
                 <div class="img_boxlistUser">
                     <i class="fa-solid fa-file-invoice-dollar"></i>
                 </div>
             </div>
         </a>
     <?php

        }
        ?>

 </div>

 <style>
     .titlle_listUsers {
         background-color: #F0F0F0;
     }

     .main_listUsers {
         display: grid;
         grid-template-columns: 30% 30% 30%;
     }

     .box_listUser {
         margin-top: 20px;
         display: flex;
     }

     .img_boxlistUser {
         flex-grow: 1;
         display: flex;
         justify-content: flex-end;
     }

     .name_bill::first-letter {
         text-transform: capitalize;
     }
 </style>