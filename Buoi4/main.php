<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name1 = $_POST['name1'];
    $name2 = $_POST['name2'];
    $email = $_POST['name3'];
    $invoice_id = $_POST['name4'];
    $description = $_POST['description'];
    $categories = isset($_POST["category"]) ? $_POST["category"] : []; 
    $categories_arr = implode(", ", $categories);

   
    $uploaded_files = [];
    if (!empty($_FILES['files']['name'][0])) {
        foreach ($_FILES['files']['tmp_name'] as $key => $tmp_name) {
            $file_name = $_FILES['files']['name'][$key];
            $file_tmp = $_FILES['files']['tmp_name'][$key];
            $upload_dir = 'uploads/';

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $file_path = $upload_dir . basename($file_name);

            if (move_uploaded_file($file_tmp, $file_path)) {
                $uploaded_files[] = $file_path;
            }
        }
    }

    $_SESSION['name1'] = $name1;
    $_SESSION['name2'] = $name2;
    $_SESSION['email'] = $email;
    $_SESSION['description'] = $description;
    $_SESSION['invoice_id'] = $invoice_id;
    $_SESSION['categories_arr'] = $categories_arr;
    $_SESSION['uploaded_files'] = $uploaded_files;

    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="app">
    <div class="form">
        <p> Tên : <?php echo isset($_SESSION['name1']) ? htmlspecialchars($_SESSION['name1']) : ''; ?></p>
        <p> Họ : <?php echo isset($_SESSION['name2']) ? htmlspecialchars($_SESSION['name2']) : ''; ?></p>
        <p> Email : <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : ''; ?></p>
        <p> ID : <?php echo isset($_SESSION['invoice_id']) ? htmlspecialchars($_SESSION['invoice_id']) : ''; ?></p>
        <p> Danh mục : <?php echo isset($_SESSION['categories_arr']) ? htmlspecialchars($_SESSION['categories_arr']) : ''; ?></p>

        <h2>Uploaded Files</h2>
        <?php if (isset($_SESSION['uploaded_files']) && !empty($_SESSION['uploaded_files'])): ?>
            <div class="uploaded-files">
                <h3>File đã tải lên:</h3>
                <ul>
                    <?php foreach ($_SESSION['uploaded_files'] as $file): ?>
                        <li><a href="<?php echo $file; ?>" target="_blank"><?php echo basename($file); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php else: ?>
            <p>Không có file nào được tải lên.</p>
        <?php endif; ?>
        <p> Additional infomation : <?php  echo isset($_SESSION['description']) ? htmlspecialchars($_SESSION['description']) : '';  ?></p>

    </div>
</div>
</body>
</html>
