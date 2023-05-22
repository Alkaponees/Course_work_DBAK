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
    
<title>Місця</title>
</head>
<body>
    <header class="header">
        <h1> Додати місце</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="places.php">Місця</a></div>
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
    // 'Номер_потягу','Номер_маршруту', 'День_відправлення', 'Час_відправлення', 'Час_прибуття', 'Тривалість_маршруту', 'Перелік_зупинок', 'Ціна'    
   $номер_потягу =  $_REQUEST['Номер_потягу'];
   $номер_вагону =  $_REQUEST['Номер_вагону'];
   $номер_місця =  $_REQUEST['Номер_місця']; 
   $статус_місця =  $_REQUEST['Статус_Місця']; 


   $sql = "INSERT INTO Місця(Номер_потягу, Номер_вагону, Номер_місця, Статус_Місця) VALUES($номер_потягу, $номер_вагону, $номер_місця, '$статус_місця');";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося додати дані до таблиці Місця" . $connection->error);
     }
     else{
        echo "<h3>Дані збережено у таблицю Місця успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>