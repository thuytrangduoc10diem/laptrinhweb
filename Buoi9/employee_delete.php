<?php
require 'employee.php';

// Kết nối đến cơ sở dữ liệu
$db = new Database();
$conn = $db->connect();
$employee = new Employee($conn);

// Lấy ID từ POST request
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;

if ($id) {
    // Thực hiện xóa nhân viên
    $result = $employee->deleteEmployee($id);

    // Kiểm tra kết quả xóa
    if ($result !== "Nhân viên đã được xóa thành công") {
        // Nếu có lỗi, có thể hiển thị thông báo
        // Thêm thông báo lỗi nếu cần thiết
        $error_message = "Lỗi: Không thể xóa nhân viên.";
    }
}

// Chuyển hướng về trang danh sách nhân viên
header("Location: employee_list.php");
exit();
?>
