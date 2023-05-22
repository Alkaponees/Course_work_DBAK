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
        <h1> Додати потяг</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="ways.php">Потяги</a></div>
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
        
       
     echo "
     <form action='add_trains_process.php' method='post'>
     <label for='fname'>Номер Потягу:</label><br>
     <input type='text' id='Номер_потягу' name='Номер_потягу'><br>
     <label for='lname'>Кількість вагонів:</label><br>
     <input type='text' id='Кількість_вагонів' name='Кількість_вагонів'><br>
     <label for='lname'>Тип потягу:</label><br>
     <input type='text' id='Тип_потягу' name='Тип_потягу'><br><br>
     <input type='submit' value='Додати'>
   </form> " ;
        mysqli_close($connection);
     ?>
     </main>
</body>