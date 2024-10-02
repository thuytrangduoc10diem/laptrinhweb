<?php

// Biến kết nối toàn cục
global $pdo;

// Hàm kết nối database
function connect_db() 
{
    global $pdo;

    // Nếu chưa kết nối thì thực hiện kết nối
    if (!$pdo) {
        try {
            $pdo = new PDO("mysql:host=sql110.infinityfree.com;dbname=if0_37096559_buoi6web;charset=utf8", "if0_37096559", "phuong12021995");
            // Thiết lập chế độ lỗi
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Can't not connect to database: " . $e->getMessage());
        }
    }
}

// Hàm ngắt kết nối
function disconnect_db() 
{
    global $pdo;
    
    // Ngắt kết nối PDO bằng cách đặt biến $pdo thành null
    if ($pdo) {
        $pdo = null;
    }
}

// Hàm lấy tất cả sinh viên
function get_all_students() 
{
    global $pdo;

    connect_db();

    $sql = "SELECT * FROM qlsinhvien";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Lấy kết quả dưới dạng mảng kết hợp
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Hàm lấy sinh viên theo ID
function get_student($student_id) 
{
    global $pdo;

    connect_db();

    $sql = "SELECT * FROM qlsinhvien WHERE id = :student_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Hàm thêm sinh viên
function add_student($student_name, $student_sex, $student_birthday) 
{
    global $pdo;

    connect_db();

    $sql = "INSERT INTO qlsinhvien (hoten, gioitinh, ngaysinh) VALUES (:name, :sex, :birthday)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $student_name);
    $stmt->bindParam(':sex', $student_sex);
    $stmt->bindParam(':birthday', $student_birthday);

    return $stmt->execute();
}

// Hàm sửa sinh viên
function edit_student($student_id, $student_name, $student_sex, $student_birthday) 
{
    global $pdo;

    connect_db();

    $sql = "UPDATE qlsinhvien SET hoten = :name, gioitinh = :sex, ngaysinh = :birthday WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name', $student_name);
    $stmt->bindParam(':sex', $student_sex);
    $stmt->bindParam(':birthday', $student_birthday);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    return $stmt->execute();
}

// Hàm xóa sinh viên
function delete_student($student_id) 
{
    global $pdo;

    connect_db();

    $sql = "DELETE FROM qlsinhvien WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $student_id, PDO::PARAM_INT);

    return $stmt->execute();
}
?>