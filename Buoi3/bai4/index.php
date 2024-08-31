

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <?php
    $name1 = $name2 = $email = $invoice_id = "";
    $name1Err = $name2Err = $emailErr = $invoice_idErr = $categoryErr = "";
    $categories = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name1"])) {
            $name1Err = "Tên không được để trống";
        } else {
            $name1 = test_input($_POST["name1"]);
        }

        if (empty($_POST["name2"])) {
            $name2Err = "Họ không được để trống";
        } else {
            $name2 = test_input($_POST["name2"]);
        }

        if (empty($_POST["name3"])) {
            $emailErr = "Email không được để trống";
        } elseif (!filter_var($_POST["name3"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Địa chỉ email không hợp lệ";
        } else {
            $email = test_input($_POST["name3"]);
        }
        if (empty($_POST["name4"])) {
            $invoice_idErr = "ID không được để trống";
        } else {
            $invoice_id = test_input($_POST["name4"]);
        }
        if (empty($_POST["category"])) {
            $categoryErr = "Bạn phải chọn ít nhất một danh mục";
        } else {
            $categories = $_POST["category"];
        }
    }

    function test_input($data) {
        $data = trim($data);
        return htmlspecialchars($data);
    }
?>
    <style>
        #app {
            overflow: hidden;
            text-align: center;
            display: flex;
            justify-content: center;
        }
        .form {
            width: 30%;
        }
        .form-name-title {
            display: flex;
        }
        .form-add {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
        }
        .form-name-item {
            margin-top: 20px;
        }
        .form-add__email {
            display: flex;
            flex-direction: column;
            width: 45%; 
        }
        .form-btn-select {
            display: grid;
            grid-template-columns: repeat(2, 1fr); 
            gap: 10px; 
            align-items: center; 
        }
        .form-btn-select input {
            margin-right: 5px;
        }
        .form-name,
        .form-btn,
        .btn-submit {
            margin-top: 30px;
        }
        .error {
            color: red;
            font-size: 15px;
        }
    </style>
</head>
<body>
    <div id="app">
        <div class="form">
            <h2 class="form-title">Payment Receipt Upload Form</h2>
            <form action="main.php" method="POST">
                <div class="form-name">
                    <span class="form-name-title">Name</span>
                    <div class="form-name-input">
                        <input type="text" class="form-name-item" name="name1" placeholder="First Name" value="<?php echo htmlspecialchars($name1); ?>">
                        <span class="error"><?php echo $name1Err;?></span>
                        <input type="text" class="form-name-item" name="name2" placeholder="Last Name" value="<?php echo htmlspecialchars($name2); ?>">
                        <span class="error"><?php echo $name2Err;?></span>
                    </div>
                </div>
                <div class="form-add">
                    <div class="form-add__email">
                        <span class="form-add__email-title">Email</span>
                        <input type="text" class="form-add__email-input" name="name3" placeholder="example@gmail.com" value="<?php echo htmlspecialchars($email); ?>">
                        <span class="error"><?php echo $emailErr;?></span>
                    </div>
                    <div class="form-add__email">
                        <span class="form-add__email-title">Invoice ID</span>
                        <input type="text" class="form-add__email-input" name="name4" placeholder="ID...." value="<?php echo htmlspecialchars($invoice_id); ?>">
                        <span class="error"><?php echo $invoice_idErr;?></span>
                    </div>
                </div>
                <div class="form-btn">
                    <span class="form-btn-title">Pay For</span>
                    <div class="form-btn-select">
                        <label><input name="category[]" type="checkbox" value="15" <?php echo in_array("15 ", $categories) ? 'checked' : ''; ?>>15k Category</label>
                        <label><input name="category[]" type="checkbox" value="35" <?php echo in_array("35", $categories) ? 'checked' : ''; ?>>35k Category</label>
                        <label><input name="category[]" type="checkbox" value="55" <?php echo in_array("55", $categories) ? 'checked' : ''; ?>>55k Category</label>
                        <label><input name="category[]" type="checkbox" value="75" <?php echo in_array("75", $categories) ? 'checked' : ''; ?>>75k Category</label>
                        <label><input name="category[]" type="checkbox" value="115" <?php echo in_array("115", $categories) ? 'checked' : ''; ?>>115k Category</label>
                        <label><input name="category[]" type="checkbox" value="135" <?php echo in_array("135", $categories) ? 'checked' : ''; ?>>135k Category</label>
                        <label><input name="category[]" type="checkbox" value="other" <?php echo in_array("other", $categories) ? 'checked' : ''; ?>>Other</label>
                        <label><input name="category[]" type="checkbox" value="train" <?php echo in_array("train", $categories) ? 'checked' : ''; ?>>Training Cap</label>
                        <label><input name="category[]" type="checkbox" value="buff" <?php echo in_array("buff", $categories) ? 'checked' : ''; ?>>Buff Test Function</label>
                        <span class="error"><?php echo $categoryErr;?></span>
                    </div>
                </div>
                <button type="submit" class="btn-submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>
