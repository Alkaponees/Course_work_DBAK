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
    
<title>Вагони</title>
</head>
<body>
    <header class="header">
        <h1>Редагувати інформацію про вагон</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="carriages.php">Вагони</a></div>
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
        $тип_вагону =  $_POST['Тип_вагону']; 
        $кількість_місць =  $_POST['Кількість_місць']; 

   $sql = "UPDATE Вагони SET Номер_потягу = $номер_потягу, Номер_вагону = $номер_вагону, 
           Тип_вагону='$тип_вагону', Кількість_місць=$кількість_місць WHERE id=$id;";
   $result = $connection->query($sql);
   
        if (!$result) {
        die("Не вдалося відредагувати дані у таблиці Вагони" . $connection->error);
     }
     else{
        echo "<h3>Дані відредаговано у таблиці Вагони успішно.</h3>";
     }
        mysqli_close($connection);
     ?>
     </main>
</body>