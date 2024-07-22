  <div class="side-bar">
      <div class="topSide_content">
          <img src="https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg?w=2000" alt="" width="150" height="auto" class="img-user" />
          <div class="User_changeImg">
              <h3><?= substr($_SESSION['user']['email'], 0, strpos($_SESSION['user']['email'], "@")); ?></h3>
          </div>
      </div>
      <div class="secondSide_content">
          <h5>Danh mục quản lý</h5>
          <div class="choose_infoUser">
              <a href="./index.php">Thông tin tài khoản</a>
              <a href="./index.php?change_pass">Đổi mật khẩu</a>
              <a href="./index.php?my_cart">Đơn hàng</a>
              <?php
                if ($_SESSION['user']['role'] != 0) {
                ?>
                  <a href="../admin/">Quản trị website</a>
              <?php
                }
                ?>
              <a href="../home/index.php">Quay về trang chính</a>

          </div>
      </div>
  </div>