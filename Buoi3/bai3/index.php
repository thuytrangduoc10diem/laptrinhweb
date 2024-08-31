<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<?php
       
        $name1Err = $name2Err = $name3Err = $name4Err = "";
        $name1 = $name2 = $name3 = $name4 = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            if (empty($_POST["name1"])) {
                $name1Err = "Tên sách không được để trống";
            } else {
                $name1 = test_input($_POST["name1"]);
            }

            
            if (empty($_POST["name2"])) {
                $name2Err = "Tên tác giả không được để trống";
            } else {
                $name2 = test_input($_POST["name2"]);
            }

           
            if (empty($_POST["name3"])) {
                $name3Err = "Tên nhà xuất bản không được để trống";
            } else {
                $name3 = test_input($_POST["name3"]);
            }

        
            if (empty($_POST["name4"])) {
                $name4Err = "Năm xuất bản không được để trống";
            } else {
                $name4 = test_input($_POST["name4"]);
                if (!preg_match("/^[0-9]{4}$/", $name4)) {
                    $name4Err = "Vui lòng nhập năm hợp lệ (YYYY)";
                }
            }
        }

        function test_input($data) {
            $data = trim($data);
            return $data;
        }
    ?>
<body>
    <div class="app">
        <div class="form">
            <form action="<?php echo trim($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-in">
                    <p class="form-in-content">Tên sách</p>
                    <input type="text" name="name1" placeholder="nhập tên sách" value="<?php echo isset($_POST['name1']) ? trim($_POST['name1']) : ''; ?>" >
                    <span class="error"><?php echo $name1Err;?></span>
                </div>
                <div class="form-in">
                    <p class="form-in-content">Tác giả</p>
                    <input type="text" name="name2" placeholder="nhập tên tác giả" value="<?php echo isset($_POST['name2']) ? trim($_POST['name2']) : ''; ?>" >
                    <span class="error"><?php echo $name2Err;?></span>
                </div>
                <div class="form-in">
                    <p class="form-in-content">Nhà xuất bản</p>
                    <input type="text" name="name3" placeholder="nhập tên nhà xuất bản" value="<?php echo isset($_POST['name3']) ? trim($_POST['name3']) : ''; ?>" >
                    <span class="error"><?php echo $name3Err;?></span>
                </div>
                <div class="form-in">
                    <p class="form-in-content">Năm xuất bản</p>
                    <input type="text" name="name4" placeholder="nhập năm xuất bản" value="<?php echo isset($_POST['name4']) ? trim($_POST['name4']) : ''; ?>" >
                    <span class="error"><?php echo $name4Err;?></span>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

   
</body>
</html>
