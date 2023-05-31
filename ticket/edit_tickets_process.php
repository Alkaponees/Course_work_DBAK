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
    
<title>Квитки</title>
</head>
<body>
    <header class="header">
        <h1>Редагувати інформацію про квиток</h1>
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

   $Номер_квитка= $_POST['номер_квитка'];
   $номер_маршруту =  $_POST['номер_маршруту'];
   $номер_дня_відправлення =  $_POST['номер_дня_відправлення'];
   $номер_місця =  $_POST['номер_місця'];
   $номер_потягу =  $_POST['номер_потягу'];
   $номер_вагону =  $_POST['номер_вагону'];
   $номер_пасажира =  $_POST['номер_пасажира'];
   $ціна =  $_POST['ціна']; 
   $sql = "UPDATE Квитки SET Номер_маршруту = $номер_маршруту, Номер_дня_відправлення = '$номер_дня_відправлення', Номер_місця = $номер_місця, Номер_потягу = $номер_потягу,
   Номер_вагону = $номер_вагону, Номер_пасажира = $номер_пасажира, Ціна = $ціна
   WHERE Номер_квитка =$Номер_квитка";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося відредагувати дані у таблиці Квитки" . $connection->error);
     }
     else{
        echo "<h3>Дані відредаговано у таблиці Квитки успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>