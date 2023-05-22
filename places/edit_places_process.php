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
        <h1>Редагувати інформацію про місце</h1>
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
        $id=$_POST['id'];
        $номер_потягу =  $_POST['Номер_потягу'];
        $номер_вагону =  $_POST['Номер_вагону'];
        $номер_місця =  $_POST['Номер_місця']; 
        $статус_місця =  $_POST['Статус_Місця']; 

   $sql = "UPDATE Місця SET Номер_потягу = $номер_потягу, Номер_вагону = $номер_вагону, 
           Номер_місця=$номер_місця, Статус_Місця='$статус_місця' WHERE id=$id;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося відредагувати дані у таблиці Місця" . $connection->error);
     }
     else{
        echo "<h3>Дані відредаговано у таблиці Місця успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>