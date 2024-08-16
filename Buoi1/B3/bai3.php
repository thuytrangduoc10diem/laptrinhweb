<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $array = [5, 2, 9, 1, 7, 3];

    function findMax($array) {
        return max($array);
    }
    function findMin($array) {
        return min($array);
    }
    function sum($array) {
        return array_sum($array);
    }
    function sortArray($array) {
        sort($array);
        return $array;
    }
    function counts($array) {
        return count($array);
    }

    // Assign the values using the functions
    $max = findMax($array);
    $min = findMin($array);
    $sum = sum($array);
    $sort = sortArray($array);
    $count = counts($array);
    ?>

    <style>
        .app{
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .app-array{
            background-color: #dbdbdb;
            padding: 30px 50px;
            border-radius: 4px;
            box-shadow: 5px 5px 10px 7px  rgba(0, 0, 0, 00.1);
        }
        .app-aray-box__value{
            padding: 10px 0;
            margin: 5px 0;
        }
    </style>
    <div class="app">
        <div class="app-array">
            <div style="font-weight: 600; font-size:20px" class="app-array-content">Array Function</div>

            <div class="app-array-box">
                <span class="app-aray-box__value">Mảng ban đầu: 
                <?php 
                    echo implode(", ", $array);
                ?></span><br>
                <span  class="app-aray-box__value">Giá trị lớn nhất trong mảng: 
                <?php
                    echo $max;
                ?></span><br>
                <span class="app-aray-box__value">Giá trị nhỏ nhất trong mảng: 
                <?php
                    echo $min;
                ?></span><br>
                <span class="app-aray-box__value">Tổng các phần tử trong mảng: 
                <?php
                    echo $sum;
                ?></span><br>
                <span class="app-array-box__value">Mảng sau khi sắp xếp: 
                <?php 
                    echo implode(", ", $sort);
                ?></span><br>
                <span class="app-aray-box__value">Số phần tử trong mảng: 
                <?php
                    echo $count;
                ?></span>
            </div>
        </div>
    </div>
</body>
</html>
