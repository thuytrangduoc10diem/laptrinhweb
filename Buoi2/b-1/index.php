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
            margin: 0 50px;
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
    <?php
        @include('function.php');

    ?>
</head>
<body>
    <div class="app">
        <div class="calculate">
            <h2 class="calculate-title">Phép tính toán 2 số</h2>
            <form method="post" action="result.php">
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
        </div>


        <div  class="test calculate">
                <h2 class="test-title">Kiểm tra số</h2>
                <form action="result.php" method="POST">

                    <div class="calculate-item">
                            <span class="calculate-item__note">Chọn phương thức: </span>
                            <ul class="calulate-item__list">
                                <li class="calulate-item__list-child">
                                    <label><input type="radio" name="operation2" value="chan-le" checked> Chẵn lẻ</label>
                                    <label><input type="radio" name="operation2" value="ngto"> Số nguyên tố</label>
                                </li>
                            </ul>
                    </div>
                     <div class="calulate-input">
                        <span class="calulate-input__note">Số kiểm tra:</span>
                        <input type="text" class="calulate-input__item" name="number" required>
                    </div>
                    <div class="calulate-btn">
                            <button type="submit" class="btn-item">Kiểm tra</button>
                    </div>
                </form>
                
        </div>
    </div>
</body>
</html>
