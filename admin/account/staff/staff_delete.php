<?php

extract($_REQUEST);
$staff_delete = user_delete($staff_delete);
$message = "Xóa thành công";
echo "<script type='text/javascript'>alert('$message');</script>";
echo "<meta http-equiv='refresh' content='0;URL=../account/index.php'>";
