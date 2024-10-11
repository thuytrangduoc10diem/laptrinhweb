<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location:register.php');
    exit();
}


echo "Chào mừng, " . htmlspecialchars($_SESSION['username']);

require 'employee.php';
$db = new Database();
$conn = $db->connect();
$employee = new Employee($conn);

$employees = $employee->getAllEmployees();


$db->disconnect();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th, td {
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Danh sách nhân viên</h1>
    <a href="employee_add.php">Thêm nhân viên</a><br/><br/>

    <table>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Role</th>
            <th>Departments</th>
            <th>Chọn thao tác</th>
        </tr>
        <?php if (count($employees) > 0): ?>
            <?php foreach ($employees as $item): ?>
            <tr>
                <td><?php echo htmlspecialchars($item['first_name']); ?></td>
                <td><?php echo htmlspecialchars($item['last_name']); ?></td>
                <td><?php echo htmlspecialchars($item['role_name']); ?></td>
                <td><?php echo htmlspecialchars($item['department_name']); ?></td>
                <td>
                    <form method="post" action="employee_delete.php">
                        <input type="button" value="Sửa" onclick="window.location.href='employee_edit.php?id=<?php echo $item['employee_id']; ?>'"/>
                        <input type="hidden" name="id" value="<?php echo $item['employee_id']; ?>"/>
                        <input type="submit" name="delete" value="Xóa" onclick="return confirm('Bạn có chắc muốn xóa không?');"/>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có nhân viên nào.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
