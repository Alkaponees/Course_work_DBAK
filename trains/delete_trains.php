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
        <h1> Видалити потяг</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="ways.php">Маршрути</a></div>
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
        
   $Номер_потягу = $_GET["Номер_потягу"];

   $sql = "DELETE FROM Потяги WHERE Номер_потягу=$Номер_потягу;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося видалити дані з таблиці Потяги" . $connection->error);
     }
     else{
        echo "<h3>Дані видалені з таблиці успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>