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
    // 'Номер_потягу','Номер_маршруту', 'День_відправлення', 'Час_відправлення', 'Час_прибуття', 'Тривалість_маршруту', 'Перелік_зупинок', 'Ціна'    
   $номер_потягу =  $_REQUEST['Номер_потягу'];
   $номер_маршруту =  $_REQUEST['Номер_маршруту'];
   $день_відправлення =  $_REQUEST['День_відправлення']; 
   $час_відправлення =  $_REQUEST['Час_відправлення']; 
   $час_прибуття =  $_REQUEST['Час_прибуття']; 
   $тривалість_маршруту =  $_REQUEST['Тривалість_маршруту']; 
   $перелік_зупинок =  $_REQUEST['Перелік_зупинок']; 
   $ціна =  $_REQUEST['Ціна']; 


   $sql = "INSERT INTO Дні_відправлення(Номер_потягу, Номер_маршруту, День_відправлення, Час_відправлення, Час_прибуття, Тривалість_маршруту, Перелік_зупинок, Ціна) VALUES($номер_потягу, $номер_маршруту, '$день_відправлення', '$час_відправлення', '$час_прибуття', '$тривалість_маршруту', $перелік_зупинок, $ціна);";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося додати дані до таблиці Дні відправлення" . $connection->error);
     }
     else{
        echo "<h3>Дані збережено у таблицю Дні відправлення успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>