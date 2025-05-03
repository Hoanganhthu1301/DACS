<?php
class AccountModel
{
    private $conn;
    private $table_name = "account";
    private $db;

    public function __construct($db)
    {
        $this->db = $db; // Gán đối tượng PDO vào thuộc tính $db
        $this->conn = $db;
        // Xóa logic thêm admin trong constructor
    }

    /**
     * Lấy thông tin tài khoản theo username
     */
    public function getAccountByUsername($username)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_OBJ); // Trả về object
    }

    /**
     * Lưu tài khoản mới vào database
     * @param string $username
     * @param string $fullname
     * @param string $password (đã mã hóa)
     * @param string $role (mặc định là 'admin')
     * @return bool
     */
    public function save($username, $fullname, $password, $email, $phone, $birthday, $role = 'admin') {
        $query = "INSERT INTO account (username, full_name, password, email, phone, birthday, role) VALUES (:username, :fullname, :password, :email, :phone, :birthday, :role)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':role', $role);

        return $stmt->execute();
    }

    public function updateFullname($username, $fullname) {
        $query = "UPDATE account SET fullname = :fullname WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }
    
    public function updatePassword($username, $hashedPassword) {
        $query = "UPDATE account SET password = :password WHERE username = :username";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':username', $username);
        return $stmt->execute();
    }
    
    public function hasAdmin() {
        $query = "SELECT COUNT(*) as admin_count FROM account WHERE role = 'admin'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['admin_count'] > 0;
    }

    public function ensureAdminExists() {
        $query = "SELECT id FROM account WHERE username = 'admin' LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$admin) {
            // Thêm admin mặc định nếu chưa tồn tại
            $username = 'admin';
            $fullname = 'Administrator';
            $password = password_hash('admin123', PASSWORD_BCRYPT, ['cost' => 12]);
            $email = 'admin@example.com';
            $phone = '0123456789';
            $birthday = '2000-01-01';
            $role = 'admin';

            $query = "INSERT INTO account (username, full_name, password, email, phone, birthday, role) VALUES (:username, :fullname, :password, :email, :phone, :birthday, :role)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':birthday', $birthday);
            $stmt->bindParam(':role', $role);
            $stmt->execute();
        }
    }

    public function create($username, $fullname, $password, $email, $phone, $birthday, $role) {
        // Kiểm tra nếu tên đăng nhập đã tồn tại
        $stmt = $this->db->prepare("SELECT COUNT(*) FROM account WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            return ['success' => false, 'message' => 'Tên đăng nhập đã tồn tại!'];
        }

        // Nếu chưa có, tiến hành thêm mới tài khoản
        $stmt = $this->db->prepare("INSERT INTO account (username, full_name, password, email, phone, birthday, role)
                                    VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$username, $fullname, $password, $email, $phone, $birthday, $role]);

        return ['success' => true, 'message' => 'Tạo tài khoản thành công!'];
    }
}
?>
