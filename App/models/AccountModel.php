<?php
class AccountModel
{
    private $conn;
    private $table_name = "account";

    public function __construct($db)
    {
        $this->conn = $db;
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
     * @param string $role (mặc định là 'user')
     * @return bool
     */
    public function save($username, $fullname, $password, $role = "user")
    {
        $query = "INSERT INTO " . $this->table_name . " (username, fullname, password, role) 
                  VALUES (:username, :fullname, :password, :role)";
        $stmt = $this->conn->prepare($query);

        // Làm sạch dữ liệu đầu vào
        $username = htmlspecialchars(strip_tags($username));
        $fullname = htmlspecialchars(strip_tags($fullname));

        // Gán dữ liệu vào câu lệnh SQL
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':fullname', $fullname);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);

        // Thực thi
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
    
    

}
?>
