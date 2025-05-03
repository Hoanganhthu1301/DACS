<?php
$password = 'admin123'; // Thay đổi mật khẩu tại đây
$hash = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
echo "Mã hash của mật khẩu là: " . $hash;
?>