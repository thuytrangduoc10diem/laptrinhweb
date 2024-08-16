<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }
        .app {
            height: 100vh;
            align-items: center;
            text-align: center;
            display: flex;
            justify-content: center;
            background-color: #dbdbdb;
        }
        .calculate {
            background-color: #fff;
            padding: 5% 3%;
            border-radius: 3px;
            box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.1);
        }
        .calculate-title {
            margin-top: -30px;
            padding-bottom: 20px;
        }
        .calculate-item {
            display: flex;
            justify-content: space-between;
        }
        .calulate-item__list-child {
            list-style: none;
        }
        .calulate-input {
            padding: 10px 0;
        }
        .btn-item {
            margin-top: 10px;
            padding: 3px 20px;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="calculate">
            <h2 class="calculate-title">Phép tính toán 2 số</h2>
            <form method="post">
                <div class="calculate-item">
                    <span class="calculate-item__note">Chọn phép tính: </span>
                    <ul class="calulate-item__list">
                        <li class="calulate-item__list-child">
                            <label><input type="radio" name="operation" value="tong" checked> Cộng</label>
                            <label><input type="radio" name="operation" value="hieu"> Trừ</label>
                            <label><input type="radio" name="operation" value="tich"> Nhân</label>
                            <label><input type="radio" name="operation" value="thuong"> Chia</label>
                        </li>
                    </ul>
                </div>

                <div class="calulate-input">
                    <span class="calulate-input__note">Số thứ nhất:</span>
                    <input type="text" class="calulate-input__item" name="number1" required>
                </div>
                <div class="calulate-input">
                    <span class="calulate-input__note">Số thứ hai:</span>
                    <input type="text" class="calulate-input__item" name="number2" required>
                </div>

                <div class="calulate-btn">
                    <button type="submit" class="btn-item">Tính</button>
                </div>
            </form>

            <div class="result">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $number1 = $_POST['number1'];
                    $number2 = $_POST['number2'];
                    $operation = $_POST['operation'];

                    if (is_numeric($number1) && is_numeric($number2)) {
                        switch ($operation) {
                            case "tong":
                                $result = $number1 + $number2;
                                break;
                            case "hieu":
                                $result = $number1 - $number2;
                                break;
                            case "tich":
                                $result = $number1 * $number2;
                                break;
                            case "thuong":
                                if ($number2 != 0) {
                                    $result = $number1 / $number2;
                                } else {
                                    $result = "Không hợp lệ";
                                }
                                break;
                            default:
                                $result = "không hợp lệ";
                                break;
                        }
                        echo "Kết quả: " . $result;
                    } else {
                        echo "nhập số hợp lệ!";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
