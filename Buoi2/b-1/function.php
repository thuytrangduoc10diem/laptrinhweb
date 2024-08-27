<?php
         function tinhTong($a, $b) {
            return $a + $b;
        }
        function tinhHieu($a, $b) {
            return $a - $b;
        }
        function tinhTich($a, $b) {
            return $a * $b;
        }
        function tinhThuong($a, $b) {
            if ($b == 0) {
                return "Không thể chia cho 0";
            }
            return $a / $b;
        }
        function kiemTraNguyenTo($n) {
            if ($n < 2) {
                return false;
            }
            for ($i = 2; $i <= sqrt($n); $i++) {
                if ($n % $i == 0) {
                    return "không phải số nguyên tố";
                }
            }
            return "là số nguyê tố";
        }
        
        
        function kiemTraChan($n) {
            return ($n % 2 == 0)? "là số chẵn" : "là số lẻ";
        }
        $result = '';
        $result2 = '';
        $number = $_POST['number'];
        $number1 = $_POST['number1'];
        $number2 = $_POST['number2'];
        $operation = $_POST['operation'];
        $operation2 = $_POST['operation2'];
       
            switch ($operation) {
                case "tong":
                    $result = "" . tinhTong($number1, $number2);
                    break;
                case "hieu":
                    $result = " " . tinhHieu($number1, $number2);
                    break;
                case "tich":
                    $result = "" . tinhTich($number1, $number2);
                    break;
                case "thuong":
                    $result = " " . tinhThuong($number1, $number2);
                    break;
                case "chan-le":
                    $result = "" . kiemTraChan($number);
                    break;
                case "ngto" :
                    $result = "" .kiemTraNguyenTo($number);
                    break;
                default:
            
                    break;
            }
            switch($operation2) {
                case "chan-le":
                    $result2 = "" . kiemTraChan($number);
                    break;
                case "ngto" :
                    $result2 = "" .kiemTraNguyenTo($number);
                    break;
                default:
                  
                    break;
            }

    ?>