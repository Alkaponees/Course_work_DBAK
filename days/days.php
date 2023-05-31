<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "icon" href = 
    "../images/railway.png" 
            type = "image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>Дні відправлення</title>
</head>
<body>
    <header class="header">
        <h1> Відображення днів відправлення(ДВ)</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_days_page.php">Додати ДВ</a></div>
            <div class="item"><a href="search_days.php">Шукати ДВ</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <br><br>
    <?php 
        $servername = 'localhost';
        $username   = 'root';
        $password   = 'ALk4p@nees0_7';
        $database   = 'railway_station';

        //  Створюємо з'єднання
        $connection = new mysqli($servername, $username, $password, $database);

        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }
        $sql = "SELECT DISTINCT Дні_відправлення.id, Потяги.Номер_потягу, Маршрути.Номер_маршруту, Дні_відправлення.День_відправлення,
        Дні_відправлення.Час_відправлення,Дні_відправлення.Час_прибуття,Дні_відправлення.Тривалість_маршруту,Дні_відправлення.Перелік_зупинок FROM Дні_відправлення
        JOIN Маршрути ON Дні_відправлення.Номер_маршруту = Маршрути.Номер_маршруту
        JOIN Потяги ON Дні_відправлення.Номер_потягу = Потяги.Номер_потягу
        ORDER BY Дні_відправлення.id";
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Дні відправлення" . $connection->error);
     }   
    
    while ($row = $result ->fetch_assoc()){
        echo "
        <table class='styled-table'>
            <thead>
            <th>ID</th>
            <th>Номер_потягу</th>
            <th>Номер_маршруту</th>
            <th>День_відправлення</th>
            <th>Час_відправлення</th>
            <th>Час_прибуття</th> 
            <th>Тривалість_маршруту</th>
            <th>Перелік_зупинок</th>
            </thead>
            <tbody>
                <tr>
                <td>$row[id]</td>
                <td>$row[Номер_потягу]</td>
                <td>$row[Номер_маршруту]</td>
                <td>$row[День_відправлення]</td>
                <td>$row[Час_відправлення]</td>
                <td>$row[Час_прибуття]</td>
                <td>$row[Тривалість_маршруту]</td>
                <td>$row[Перелік_зупинок]</td>
                    <td class='active-row'>
                        <a  href='edit_days_page.php? id=" .$row['id']."'>Редагувати</a>
                        <a  href='delete_days.php? id=".$row['id']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    
    ?>

</main>
</body>
</html>