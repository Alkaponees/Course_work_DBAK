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
            <div class="item"><a href="people.php">Пасажири</a></div>
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
        
   $прізвище_пасажира =  $_REQUEST['прізвище_пасажира'];
   $імя_пасажира =  $_REQUEST['імя_пасажира'];
   $номер_телефону_пасажира = $_REQUEST['номер_телефону_пасажира'];
   $наявність_пільги= $_REQUEST['наявність_пільги'];
   
   $sql = "INSERT INTO Пасажири(Прізвище_пасажира, Імя_пасажира, Номер_телефону_пасажира, Наявність_пільги) VALUES('$прізвище_пасажира', '$імя_пасажира','$номер_телефону_пасажира','$наявність_пільги');";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося додати дані до таблиці Пасажири" . $connection->error);
     }
     else{
        echo "<h3>Дані збережено у таблицю Пасажири успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>