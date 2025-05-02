<?php
require_once('app/config/database.php');
require_once('app/models/AccountModel.php');

class AccountController {
    private $accountModel;
    private $db;

    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->accountModel = new AccountModel($this->db);
    }

    public function register() {
        include_once 'app/views/account/register.php';
    }

    public function login() {
        include_once 'app/views/account/login.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $fullname = $_POST['fullname'] ?? '';
            $password = $_POST['password'] ?? '';
            $confirmPassword = $_POST['confirmpassword'] ?? '';
    
            $errors = [];
    
            if (empty($username)) {
                $errors['username'] = "Vui lòng nhập Username!";
            }
    
            if (empty($fullname)) {
                $errors['fullname'] = "Vui lòng nhập Họ và Tên!";
            }
    
            if (empty($password)) {
                $errors['password'] = "Vui lòng nhập Mật khẩu!";
            } else {
                // Kiểm tra điều kiện mật khẩu
                if (strlen($password) < 8) {
                    $errors['password'] = "Mật khẩu phải có ít nhất 8 ký tự!";
                }
                
                // Kiểm tra có ít nhất 1 chữ in hoa
                if (!preg_match('/[A-Z]/', $password)) {
                    $errors['password'] = "Mật khẩu phải có ít nhất 1 ký tự in hoa!";
                }
                
                // Kiểm tra có ít nhất 1 ký tự đặc biệt
                if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
                    $errors['password'] = "Mật khẩu phải có ít nhất 1 ký tự đặc biệt!";
                }
            }
    
            if ($password !== $confirmPassword) {
                $errors['confirmPass'] = "Mật khẩu và xác nhận chưa trùng khớp!";
            }
    
            // Kiểm tra username đã tồn tại chưa
            $account = $this->accountModel->getAccountByUsername($username);
    
            if ($account) {
                $errors['account'] = "Tài khoản này đã có người đăng ký!";
            }
    
            if (count($errors) > 0) {
                include_once 'app/views/account/register.php';
            } else {
                // Mã hóa mật khẩu
                $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);
                $result = $this->accountModel->save($username, $fullname, $password);
    
                if ($result) {
                    header('Location: /webbanhang/account/login');
                    exit();
                }
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy(); // Hủy toàn bộ session
        header('Location: /webbanhang/account/login');
        exit();
    }
    public function profile() {
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /webbanhang/account/login');
            exit();
        }
    
        include 'app/views/account/profile.php';
    }
    
    public function updateProfile() {
        if (!SessionHelper::isLoggedIn()) {
            header('Location: /webbanhang/account/login');
            exit();
        }
    
        $fullname = $_POST['fullname'];
        $currentPassword = $_POST['current_password'] ?? '';
        $newPassword = $_POST['new_password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';
        $username = $_SESSION['user']['username'];
    
        $account = $this->accountModel->getAccountByUsername($username);
    
        // Cập nhật họ tên
        $this->accountModel->updateFullname($username, $fullname);
        $_SESSION['user']['fullname'] = $fullname;
    
        // Nếu có đổi mật khẩu
        if (!empty($currentPassword) || !empty($newPassword) || !empty($confirmPassword)) {
            if (!password_verify($currentPassword, $account->password)) {
                die("⚠️ Mật khẩu hiện tại không đúng!");
            }
    
            if ($newPassword !== $confirmPassword) {
                die("⚠️ Mật khẩu mới và xác nhận không khớp!");
            }
    
            if (strlen($newPassword) < 6) {
                die("⚠️ Mật khẩu mới phải ít nhất 6 ký tự.");
            }
    
            $hashed = password_hash($newPassword, PASSWORD_BCRYPT);
            $this->accountModel->updatePassword($username, $hashed);
        }
    
        echo "<script>alert('Cập nhật thành công!'); window.location='/webbanhang/account/profile';</script>";
    }
    public function checkLogin() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'] ?? '';
            $password = $_POST['password'] ?? '';
    
            $account = $this->accountModel->getAccountByUsername($username);
    
            if ($account) {
                if (password_verify($password, $account->password)) {
                    // ✅ Gán đầy đủ thông tin tài khoản vào session
                    $_SESSION['user'] = [
                        'username' => $account->username,
                        'fullname' => $account->fullname, // <--- QUAN TRỌNG
                        'role'     => $account->role
                    ];
    
                    header('Location: /webbanhang/product');
                    exit();
                } else {
                    echo "⚠️ Mật khẩu không đúng!";
                }
            } else {
                echo "⚠️ Không tìm thấy tài khoản!";
            }
        }
    }
}
?>
