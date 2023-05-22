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
        <h1> Видалити місце</h1>
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
        
   $id = $_GET["id"];

   $sql = "DELETE FROM Місця WHERE id=$id;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося видалити дані з таблиці Місця" . $connection->error);
     }
     else{
        echo "<h3>Дані видалені з  таблиці Місця успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>