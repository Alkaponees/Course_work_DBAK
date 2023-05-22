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
        <h1> Рудагувати дані про пасажира</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="people.php">Маршрути</a></div>
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
   $id = $_POST['id'];     
   $прізвище_пасажира = $_POST['прізвище_пасажира'];
   $імя_пасажира = $_POST ['імя_пасажира'];
   $номер_телефону_пасажира = $_POST ['номер_телефону_пасажира'];
   $наявність_пільги = $_POST ['наявність_пільги'];

   $sql = "UPDATE Пасажири SET Прізвище_пасажира = '$прізвище_пасажира', Імя_пасажира = '$імя_пасажира', Номер_телефону_пасажира='$номер_телефону_пасажира', Наявність_пільги='$наявність_пільги' WHERE id=$id;";
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