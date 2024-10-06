<?php
// Kết nối cơ sở dữ liệu
class Database {
    private $host = "localhost";
    private $db_name = "employee_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }

    public function disconnect() {
        $this->conn = null;
    }
}

// Class Employee để xử lý các thao tác liên quan đến nhân viên
class Employee {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy tất cả nhân viên
    public function getAllEmployees() {
        $query = "SELECT Departments.department_id, EmployeeRoles.role_id, employees.employee_id, Employees.first_name, Employees.last_name, Departments.department_name, EmployeeRoles.role_name
                  FROM Employees 
                  JOIN Departments ON Employees.department_id = Departments.department_id 
                  JOIN EmployeeRoles ON Employees.role_id = EmployeeRoles.role_id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy nhân viên theo ID
    public function getEmployeeById($employee_id) {
        $query = "SELECT * FROM Employees WHERE employee_id = :employee_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Thêm nhân viên
    public function addEmployee($first_name, $last_name, $department_id, $role_id) {
        $query = "INSERT INTO Employees (first_name, last_name, department_id, role_id) VALUES (:first_name, :last_name, :department_id, :role_id)";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':role_id', $role_id);
        
        if ($stmt->execute()) {
            return "Thêm dữ liệu thành công";
        } else {
            return "Lỗi thêm dữ liệu";
        }
    }

    // Cập nhật nhân viên
    public function updateEmployee($employee_id, $first_name, $last_name, $department_id, $role_id) {
        $query = "UPDATE Employees SET first_name = :first_name, last_name = :last_name, department_id = :department_id, role_id = :role_id WHERE employee_id = :employee_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id);
        $stmt->bindParam(':first_name', $first_name);
        $stmt->bindParam(':last_name', $last_name);
        $stmt->bindParam(':department_id', $department_id);
        $stmt->bindParam(':role_id', $role_id);
        
        if ($stmt->execute()) {
            return $stmt->rowCount() . " records UPDATED successfully";
        } else {
            return "Lỗi cập nhật dữ liệu";
        }
    }

    // Xóa nhân viên
    public function deleteEmployee($employee_id) {
        $query = "DELETE FROM Employees WHERE employee_id = :employee_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':employee_id', $employee_id);
        if ($stmt->execute()) {
            return "Nhân viên đã được xóa thành công";
        } else {
            return "Lỗi xóa nhân viên";
        }
    }

    // Lấy tất cả chức vụ
    public function getAllRoles() {
        $query = "SELECT * FROM EmployeeRoles";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy tất cả phòng ban
    public function getAllDepartments() {
        $query = "SELECT * FROM Departments";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

// Sử dụng lớp Database và Employee
$db = new Database();
$conn = $db->connect();

$employee = new Employee($conn);

// Ví dụ: Lấy tất cả nhân viên
$employees = $employee->getAllEmployees();


// Đóng kết nối
$db->disconnect();
?>
