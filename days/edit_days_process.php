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
        <h1>Редагувати день відправлення</h1>
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
        $id=$_POST['id'];
        $номер_потягу =  $_POST['Номер_потягу'];
        $номер_маршруту =  $_POST['Номер_маршруту'];
        $день_відправлення =  $_POST['День_відправлення']; 
        $час_відправлення =  $_POST['Час_відправлення']; 
        $час_прибуття =  $_POST['Час_прибуття']; 
        $тривалість_маршруту =  $_POST['Тривалість_маршруту']; 
        $перелік_зупинок =  $_POST['Перелік_зупинок']; 

   $sql = "UPDATE Дні_відправлення SET Номер_потягу = $номер_потягу, Номер_маршруту = $номер_маршруту, 
           День_відправлення='$день_відправлення', Час_відправлення='$час_відправлення', Час_прибуття='$час_прибуття', Тривалість_маршруту='$тривалість_маршруту', Перелік_зупинок=$перелік_зупинок WHERE id=$id;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося відредагувати дані у таблиці Дні відправлення" . $connection->error);
     }
     else{
        echo "<h3>Дані відредаговано у таблиці Дні відправлення успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>
</html>