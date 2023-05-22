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
    
<title>Маршрути</title>
</head>
<body>
    <header class="header">
        <h1> Редагувати дані про маршрут</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="ways.php">Пасажири</a></div>
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
   $номер_маршруту = $_POST['номер_маршруту'];     
   $пункт_відправлення = $_POST['пункт_відправлення'];
   $пункт_призначення = $_POST ['пункт_призначення'];

   $sql = "UPDATE Маршрути SET Пункт_відправлення = '$пункт_відправлення', Пункт_призначення = '$пункт_призначення' WHERE Номер_маршруту=$номер_маршруту;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося відредагувати дані до таблиці Маршрути" . $connection->error);
     }
     else{
        echo "<h3>Дані відредаговано у базі даних успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>