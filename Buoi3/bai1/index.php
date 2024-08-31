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
            <form action="main.php" method="post">
                <div class="form-in">
                    <p class="form-in-content">tên sách</p>
                    <input type="text" name="name1" placeholder="nhập tên sách" required>
                </div>
                <div class="form-in">
                    <p class="form-in-content">tác giả</p>
                    <input type="text" name="name2" placeholder="nhập tên tác giả" required>
                </div>
                <div class="form-in">
                    <p class="form-in-content">nhà xuất bản</p>
                    <input type="text" name="name3" placeholder="nhập tên nhà xuất bản" required>
                </div>
                <div class="form-in">
                    <p class="form-in-content">năm xuất bản</p>
                    <input type="text" name="name4" placeholder="nhập tên năm xuất bản" required>
                </div>
                <button>submit</button>
            </form>
        </div>
    </div>
    <?php
     if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name1 = $_POST['name1'];
        $name2 = $_POST['name2'];
        $name3 = $_POST['name3'];
        $name4 = $_POST['name4'];
     }
    ?>
</body>
</html>