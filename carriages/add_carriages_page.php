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
    
<title>Вагони</title>
</head>
<body>
    <header class="header">
        <h1> Додати вагон</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="carriages.php">Вагони</a></div>
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
    $sql2 = "SELECT * FROM Вагони;";
    $result2=$connection->query($sql2);

 if (!$result2) {
    die("Не вдалося отримати дані з таблиці Потяги" . $connection->error);
 } 
    echo "
    <h3>Вагони</h3>";
       while ($row2 = $result2 ->fetch_assoc()){
        echo "
        <table class='styled-table'>
            <thead>
                <th>id</th>
                <th>Номер вагону</th>
                <th>Номер потягу</th>
                <th>Тип потягу</th>
                <th>Кількість місць</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row2[id]</td>
                    <td>$row2[Номер_вагону]</td>
                    <td>$row2[Номер_потягу]</td>
                    <td>$row2[Тип_вагону]</td>
                    <td>$row2[Кількість_місць]</td>
                    </tr>
            </tbody>
        </table>
        ";
       }
     // 'Номер_потягу','Номер_маршруту', 'День_відправлення', 'Час_відправлення', 'Час_прибуття', 'Тривалість_маршруту', 'Перелік_зупинок', 'Ціна'  
     echo "<br>
    <form action='add_carriages_process.php' method='post'>
    <label for='fname'>Номер Потягу:</label><br>
    <input type='text' id='Номер_потягу' name='Номер_потягу'><br>
    <label for='fname'>Номер вагону: (Приклад: 2023-05-21):</label><br>
    <input type='text' id='Номер_вагону' name='Номер_вагону'><br>
    <label for='lname'>Тип вагону: (Приклад: Плацкарт,Купе, Плацкарт люкс, Купе):</label><br>
    <input type='text' id='Тип_вагону' name='Тип_вагону'><br>
    <label for='lname'>Кількість місць: </label><br>
    <input type='text' id='Кількість_місць' name='Кількість_місць'><br><br>
    <input type='submit' value='Додати'>
  </form> " ;
        mysqli_close($connection);
     ?>
     </main>
</body>