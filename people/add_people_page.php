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
        <h1> Додати пасажирв</h1>
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
        
       
     echo "
     <form action=\"add_people_process.php\" method='post'>
     <label for=\"fname\">Прізвище_пасажира:</label><br>
     <input type=\"text\" id=\"прізвище_пасажира\" name=\"прізвище_пасажира\"><br>
     <label for=\"lname\">Ім'я пасажира:</label><br>
     <input type=\"text\" id=\"імя_пасажира\" name=\"імя_пасажира\"><br>
     <label for=\"lname\">Номер телефону пасажира:</label><br>
     <input type=\"text\" id=\"номер_телефону_пасажира\" name=\"номер_телефону_пасажира\"><br>
     <label for=\"lname\">Наявність пільги:</label><br>
     <input type=\"text\" id=\"наявність_пільги\" name=\"наявність_пільги\"><br><br>
     <input type=\"submit\" value=\"Додати\">
   </form> " ;
        mysqli_close($connection);
     ?>
     </main>
</body>