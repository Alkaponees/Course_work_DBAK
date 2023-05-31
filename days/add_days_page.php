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
        <h1> Додати день відправлення</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="days.php">Дні відправлення</a></div>
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
        $sql = "SELECT Номер_маршруту, Пункт_відправлення, Пункт_призначення FROM Маршрути;";
        $sql2 = "SELECT Номер_потягу FROM Потяги;";
        $result = $connection->query($sql);
        $result2=$connection->query($sql2);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Маршрути" . $connection->error);
     } 
     if (!$result2) {
        die("Не вдалося отримати дані з таблиці Потяги" . $connection->error);
     } 
     echo "
     <h3>Маршрути</h3>";
        while ($row = $result ->fetch_assoc()){
            echo "
            <table class='styled-table'>
                <thead>
                <th>Номер маршруту</th>
                <th>Пункт відправлення</th>
                <th>Пункт призначення</th>
                </thead>
                <tbody>
                    <tr>
                    <td>$row[Номер_маршруту]</td>
                    <td>$row[Пункт_відправлення]</td>
                    <td>$row[Пункт_призначення]</td>
                        </tr>
                </tbody>
            </table>
            ";
        }
        echo "
        <h3>Потяги</h3>";
           while ($row2 = $result2 ->fetch_assoc()){
               echo "
               <table class='styled-table'>
                   <thead>
                   <th>Номер потягу</th>
                   </thead>
                   <tbody>
                       <tr>
                       <td>$row2[Номер_потягу]</td>
                        </tr>
                   </tbody>
               </table>
               ";
           }
     // 'Номер_потягу','Номер_маршруту', 'День_відправлення', 'Час_відправлення', 'Час_прибуття', 'Тривалість_маршруту', 'Перелік_зупинок', 'Ціна'  
     echo "<br>
     <form action='add_days_process.php' method='post'>
     <label for='fname'>Номер Потягу:</label><br>
     <input type='text' id='Номер_потягу' name='Номер_потягу'><br><br>
     <label for='fname'>Номер Маршруту:</label><br>                      
     <input type='text' id='Номер_маршруту' name='Номер_маршруту'><br><br>
     <label for='fname'>День відправлення (Приклад: 2023-05-21):</label><br>
     <input type='text' id='День_відправлення' name='День_відправлення'><br><br>
     <label for='lname'>Час відправлення (Приклад: 2023-05-21 09:00:00):</label><br>
     <input type='text' id='Час_відправлення' name='Час_відправлення'><br><br>
     <label for='lname'>Час прибуття (Приклад: 2023-05-21 09:00:00):</label><br>
     <input type='text' id='Час_прибуття' name='Час_прибуття'><br><br>
     <label for='lname'>Тривалість маршруту (Приклад: 09:00:00):</label><br>
     <input type='text' id='Тривалість_маршруту' name='Тривалість_маршруту'><br><br>
     <label for='lname'>Перелік зупинок:</label><br>
     <input type='text' id='Перелік_зупинок' name='Перелік_зупинок'><br><br>
     <input type='submit' value='Додати'>
   </form> " ;
        mysqli_close($connection);
     ?>
     </main>
</body>
</html>