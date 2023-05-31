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
    
<title>Пасажири</title>
</head>
<body>
    <header class="header">
        <h1> Додати пасажира</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="tickets.php">Квитки</a></div>
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
        
   
   $номер_маршруту =  $_REQUEST['номер_маршруту'];
   $номер_дня_відправлення =  $_REQUEST['номер_дня_відправлення'];
   $номер_місця =  $_REQUEST['номер_місця'];
   $номер_потягу =  $_REQUEST['номер_потягу'];
   $номер_вагону =  $_REQUEST['номер_вагону'];
   $номер_пасажира =  $_REQUEST['номер_пасажира'];
   $ціна =  $_REQUEST['ціна'];
   
   $sql = "INSERT INTO Квитки(Номер_маршруту, Номер_дня_відправлення, Номер_місця, Номер_потягу, Номер_вагону, номер_пасажира, Ціна) 
   VALUES($номер_маршруту, $номер_дня_відправлення, $номер_місця, $номер_потягу, $номер_вагону, $номер_пасажира, $ціна);";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося додати дані до таблиці Квитки" . $connection->error);
     }
     else{
        echo "<h3>Дані збережено у таблицю Квитки успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>