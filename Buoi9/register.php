<?php
session_start();
require 'employee.php'; // Kết nối cơ sở dữ liệu với PDO

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu

    // Kiểm tra nếu tài khoản đã tồn tại
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo "Tài khoản đã tồn tại!";
    } else {
        // Thêm tài khoản mới vào cơ sở dữ liệu
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        
        if ($stmt->execute()) {
            echo "Đăng ký thành công!";
            header('Location: login.php'); // Chuyển hướng đến trang đăng nhập sau khi đăng ký thành công
            exit();
        } else {
            echo "Đăng ký thất bại!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
</head>
<body>
    <h1>Đăng ký tài khoản</h1>
    <form action="register.php" method="POST">
        <label for="username">Tài khoản:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Đăng ký</button>
    </form>
</body>
</html>
