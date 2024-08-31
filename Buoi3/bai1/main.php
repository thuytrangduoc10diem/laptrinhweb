<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
      
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $name1 = $_POST['name1'];
           $name2 = $_POST['name2'];
           $name3 = $_POST['name3'];
           $name4 = $_POST['name4'];
        }
       
    ?>
    <div class="app">
        <div class="form">
            <form action="main.php" method="get">              
                
                <p> tên sách: <?php echo htmlspecialchars($name1); ?></p>
                <p> tên tác giả: <?php echo htmlspecialchars($name2); ?></p>
                <p> tên nhà xuất bản: <?php echo htmlspecialchars($name3); ?></p>
                <p> tên năm sản xuất: <?php echo htmlspecialchars($name4); ?></p>
            </form>
        </div>
    </div>
</body>
</html>
