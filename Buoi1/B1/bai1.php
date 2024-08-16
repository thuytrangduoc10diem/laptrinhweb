<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .app {
            width: 100%;
            text-align: center;
            align-items: center;
            display: flex;
            justify-content: center;
            flex-direction: column;
        }
        .table {
            border-collapse: collapse; 
            border-spacing: 0;
            margin-top: 20px;
        }
        td, th {
            border: 1px solid #999;
            padding: 8px 12px;
        }
        .active {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="app">
        <table class="table">
            <thead>
                <tr class="table-box">
                    <th>STT</th>
                    <th>Tên sách</th>
                    <th>Nội dung sách</th>
                </tr>
            </thead>
            <tbody id="bookTable">
                <?php
                    for ($i = 1; $i <= 100; $i++) { 
                        echo
                        "<tr>
                            <td><span class='table-id'>{$i}</span></td>
                            <td><span class='table-name'>tên sách{$i}</span></td>
                            <td><span class='table-content'>nội dung sách{$i}</span></td>
                        </tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        const changes = document.querySelectorAll('#bookTable tr');
        changes.forEach(change => {
            change.style.display = 'none';
        });
        
        if (changes.length > 0) changes[0].style.display = '';
        if (changes.length > 0) changes[1].style.display = '';
        if (changes.length > 1) changes[changes.length - 1].style.display = ''; 
        const numActives = 6; 
        const activeChanges = Array.from({length: numActives}, () => {
            const change = document.createElement('tr');
            change.classList.add('active');
            change.innerHTML = '<td >...</td> <td >...</td> <td>...</td>';
            return change;
        });

        const centerIndex = Math.floor(changes.length / 2);
        const tbody = document.getElementById('bookTable');

        activeChanges.forEach((activeChange, i) => {
            tbody.insertBefore(activeChange, changes[centerIndex]);
        });
    </script>
</body>
</html>
