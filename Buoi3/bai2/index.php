<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error-message {
            color: red;
            font-size: 12px;
            display: none;
        }
        .form{
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="app">
        <div class="form">
            <form id="bookForm">
                <div class="form-in">
                    <p class="form-in-content">tên sách</p>
                    <input type="text" name="name1" id="name1" placeholder="nhập tên sách" >
                    <span class="error-message" id="errorName1">Vui lòng nhập tên sách</span>
                </div>
                <div class="form-in">
                    <p class="form-in-content">tác giả</p>
                    <input type="text" name="name2" id="name2" placeholder="nhập tên tác giả" >
                    <span class="error-message" id="errorName2">Vui lòng nhập tên tác giả</span>
                </div>
                <div class="form-in">
                    <p class="form-in-content">nhà xuất bản</p>
                    <input type="text" name="name3" id="name3" placeholder="nhập tên nhà xuất bản" >
                    <span class="error-message" id="errorName3">Vui lòng nhập tên nhà xuất bản</span>
                </div>
                <div class="form-in">
                    <p class="form-in-content">năm xuất bản</p>
                    <input type="text" name="name4" id="name4" placeholder="nhập năm xuất bản" >
                    <span class="error-message" id="errorName4">Vui lòng nhập năm xuất bản hợp lệ (YYYY)</span>
                </div>
                <button type="submit">submit</button>
            </form>
        </div>
    </div>
    
    <script>
        document.getElementById('bookForm').addEventListener('submit', function(event) {
            let isValid = true;

            const name1 = document.getElementById('name1').value.trim();
            if (name1 === "") {
                isValid = false;
                document.getElementById('errorName1').style.display = 'block';
            } else {
                document.getElementById('errorName1').style.display = 'none';
            }

            const name2 = document.getElementById('name2').value.trim();
            if (name2 === "") {
                isValid = false;
                document.getElementById('errorName2').style.display = 'block';
            } else {
                document.getElementById('errorName2').style.display = 'none';
            }

            const name3 = document.getElementById('name3').value.trim();
            if (name3 === "") {
                isValid = false;
                document.getElementById('errorName3').style.display = 'block';
            } else {
                document.getElementById('errorName3').style.display = 'none';
            }

            const name4 = document.getElementById('name4').value.trim();
            const yearPattern = /^\d{4}$/;
            if (name4 === "" || !yearPattern.test(name4)) {
                isValid = false;
                document.getElementById('errorName4').style.display = 'block';
            } else {
                document.getElementById('errorName4').style.display = 'none';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
