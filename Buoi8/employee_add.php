<?php
require 'employee.php';

try {
    $conn = new PDO("mysql:host=localhost;dbname=employee_db", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

$employeeObj = new Employee($conn);

// Lấy danh sách vai trò (role) và phòng ban (department)
$roles = $employeeObj->getAllRoles();
$departments = $employeeObj->getAllDepartments();

// Nếu người dùng submit form
if (!empty($_POST['add_employee'])) {
    // Lấy dữ liệu từ form
    $data['firstname'] = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $data['lastname'] = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $data['role'] = isset($_POST['role']) ? $_POST['role'] : '';
    $data['department'] = isset($_POST['department']) ? $_POST['department'] : '';

    // Validate thông tin
    $errors = array();
    if (empty($data['firstname'])) {
        $errors['firstname'] = 'Chưa nhập họ đệm nhân viên';
    }

    if (empty($data['lastname'])) {
        $errors['lastname'] = 'Chưa nhập tên nhân viên';
    }

    // Lấy role_id và department_id
    $role_id_data = $employeeObj->getRoleId($data['role']);
    $role_id = $role_id_data['role_id'];

    $department_id_data = $employeeObj->getDepartmentId($data['department']);
    $department_id = $department_id_data['department_id'];

    // Nếu không có lỗi thì thêm nhân viên
    if (!$errors) {
        $employeeObj->addEmployee($data['firstname'], $data['lastname'], $department_id, $role_id);

        // Trở về trang danh sách
        header("Location: employee_list.php");
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm nhân viên</title>
</head>
<body>
    <h1>Thêm nhân viên</h1>
    <a href="employee_list.php">Trở về</a> <br/><br/>
    <form method="post" action="employee_add.php">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>First name</td>
                <td>
                    <input type="text" name="firstname" value="<?php echo !empty($data['firstname']) ? $data['firstname'] : ''; ?>"/>
                    <?php if (!empty($errors['firstname'])) echo $errors['firstname']; ?>
                </td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>
                    <input type="text" name="lastname" value="<?php echo !empty($data['lastname']) ? $data['lastname'] : ''; ?>"/>
                    <?php if (!empty($errors['lastname'])) echo $errors['lastname']; ?>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <?php foreach ($roles as $role) { ?>
                            <option><?php echo $role['role_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="department">
                        <?php foreach ($departments as $department) { ?>
                            <option><?php echo $department['department_name']; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="add_employee" value="Lưu"/>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
