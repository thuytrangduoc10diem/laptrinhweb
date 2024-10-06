<?php
require 'employee.php';

// Kết nối đến cơ sở dữ liệu
$db = new Database();
$conn = $db->connect();
$employee = new Employee($conn);

// Khởi tạo biến
$emid = '';
$firstname = '';
$lastname = '';
$rolename = '';
$departmentname = '';
$errors = [];

// Lấy thông tin hiển thị để người dùng sửa
$id = isset($_GET['id']) ? (int)$_GET['id'] : '';
if ($id) {
    $data = $employee->getEmployeeById($id);
    
    // Nếu không có dữ liệu, chuyển về trang danh sách
    if (!$data) {
        header("location: employee_list.php");
        exit();
    }

    $emid = $data['employee_id'];
    $firstname = $data['first_name'];
    $lastname = $data['last_name'];
    $emroleid = $data['role_id'];
    $emdepartmentid = $data['department_id'];

    // Lấy tên role và department
    $role1 = $employee->getAllRoles();
    $department1 = $employee->getAllDepartments();
    
    // Tìm tên role và department
    foreach ($role1 as $role) {
        if ($role['role_id'] == $emroleid) {
            $rolename = $role['role_name'];
            break;
        }
    }

    foreach ($department1 as $department) {
        if ($department['department_id'] == $emdepartmentid) {
            $departmentname = $department['department_name'];
            break;
        }
    }
}

// Nếu người dùng submit form
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_employee'])) {
    // Lấy dữ liệu
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $department_id = isset($_POST['department']) ? $_POST['department'] : '';
    $role_id = isset($_POST['role']) ? $_POST['role'] : '';

    // Validate dữ liệu
    if (empty($firstname)) {
        $errors['firstname'] = 'Họ nhân viên không bỏ trống';
    }
    if (empty($lastname)) {
        $errors['lastname'] = 'Tên nhân viên không bỏ trống';
    }

    // Nếu không có lỗi thì cập nhật
    if (empty($errors)) {
        // Lấy ID của role và department
        $roleData = array_filter($role1, fn($role) => $role['role_name'] === $role_id);
        $departmentData = array_filter($department1, fn($dept) => $dept['department_name'] === $department_id);

        $emroleid = !empty($roleData) ? reset($roleData)['role_id'] : null;
        $emdepartmentid = !empty($departmentData) ? reset($departmentData)['department_id'] : null;

        if ($employee->updateEmployee($emid, $firstname, $lastname, $emdepartmentid, $emroleid)) {
            // Trở về trang danh sách
            header("location: employee_list.php");
            exit();
        } else {
            $errors['update'] = 'Lỗi cập nhật dữ liệu';
        }
    }
}

$db->disconnect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sửa thông tin nhân viên</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1>Sửa thông tin nhân viên</h1>
    <a href="employee_list.php">Trở về</a> <br/> <br/>
    <form method="post" action="employee_edit.php?id=<?php echo htmlspecialchars($emid); ?>">
        <table width="50%" border="1" cellspacing="0" cellpadding="10">
            <tr>
                <td>First name</td>
                <td>
                    <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>"/>
                    <?php if (!empty($errors['firstname'])) echo $errors['firstname']; ?>
                </td>
            </tr>
            <tr>
                <td>Last name</td>
                <td>
                    <input type="text" name="lastname" value="<?php echo htmlspecialchars($lastname); ?>"/>
                    <?php if (!empty($errors['lastname'])) echo $errors['lastname']; ?>
                </td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role">
                        <option value="<?php echo htmlspecialchars($rolename); ?>"><?php echo htmlspecialchars($rolename); ?></option>
                        <?php foreach ($role1 as $item) { ?>
                            <option value="<?php echo htmlspecialchars($item['role_name']); ?>"><?php echo htmlspecialchars($item['role_name']); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Department</td>
                <td>
                    <select name="department">
                        <option value="<?php echo htmlspecialchars($departmentname); ?>"><?php echo htmlspecialchars($departmentname); ?></option>
                        <?php foreach ($department1 as $item) { ?>
                            <option value="<?php echo htmlspecialchars($item['department_name']); ?>"><?php echo htmlspecialchars($item['department_name']); ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($emid); ?>"/>
                    <input type="submit" name="edit_employee" value="Lưu"/>
                </td>
            </tr>
        </table>
        <?php if (!empty($errors['update'])) echo $errors['update']; ?>
    </form>
</body>
</html>
