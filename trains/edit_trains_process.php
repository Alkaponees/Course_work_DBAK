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
    
<title>Потяги</title>
</head>
<body>
    <header class="header">
        <h1> Редагувати дані про потяг</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="trains.php">Потяги</a></div>
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
   $номер_потягу = $_POST['номер_потягу'];     
   $кількість_вагонів = $_POST['кількість_вагонів'];
   $тип_потягу = $_POST ['тип_потягу'];

   $sql = "UPDATE Потяги SET Кількість_вагонів = '$кількість_вагонів', Тип_потягу = '$тип_потягу' WHERE Номер_потягу=$номер_потягу;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося відредагувати дані до таблиці Маршрути" . $connection->error);
     }
     else{
        echo "<h3>Дані відредаговано у таблиці успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>