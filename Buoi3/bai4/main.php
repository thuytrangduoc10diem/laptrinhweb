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
        <form action="main.php" method="GET">              
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $name1 = $_POST['name1'];
                    $name2 = $_POST['name2'];
                    $email = $_POST['name3'];
                    $invoice_id = $_POST['name4'];
                    $categories = isset($_POST["category"]) ? $_POST["category"] : []; 
                    $categories_arr = implode(", ", $categories);
                }
            ?>
            <p> Tên : <?php echo isset($name1) ? htmlspecialchars($name1) : ''; ?></p>
            <p> Họ : <?php echo isset($name2) ? htmlspecialchars($name2) : ''; ?></p>
            <p> Email : <?php echo isset($email) ? htmlspecialchars($email) : ''; ?></p>
            <p> ID : <?php echo isset($invoice_id) ? htmlspecialchars($invoice_id) : ''; ?></p>
            <p> Danh mục : <?php echo isset($categories_arr) ? htmlspecialchars($categories_arr) : ''; ?></p>
        </form>
    </div>
</div>
</body>
</html>
