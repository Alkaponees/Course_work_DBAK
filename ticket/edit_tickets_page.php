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
    
<title>Квитки</title>
</head>
<body>
    <header class="header">
        <h1> Редагувати дані про квиток</h1>
        <nav>
        <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="tickets.php">Квитки</a></div>
            <div class="item"><a href="../places/places.php">Місця</a></div>
            <div class="item"><a href="../people/people.php">Пасажири</a></div>
            <div class="item"><a href="../days/days.php">Дні відправленняі</a></div>
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
        $Номер_квитка=$_GET['Номер_квитка'];
        $sql = "SELECT DISTINCT Квитки.Номер_квитка, Маршрути.Номер_маршруту, 
        Дні_відправлення.День_відправлення, Потяги.Номер_потягу, Вагони.Номер_вагону, 
        Місця.Номер_місця, Пасажири.Імя_пасажира, Пасажири.Прізвище_пасажира, 
        Пасажири.Наявність_пільги, Квитки.Ціна FROM Квитки 
        JOIN Маршрути ON Квитки.Номер_маршруту = Маршрути.Номер_маршруту 
        JOIN Дні_відправлення ON Квитки.Номер_дня_відправлення = Дні_відправлення.id 
        JOIN Потяги ON Квитки.Номер_потягу = Потяги.Номер_потягу 
        JOIN Вагони ON Квитки.Номер_вагону = Вагони.id
        JOIN Місця ON Квитки.Номер_місця = Місця.id 
        JOIN Пасажири ON Квитки.Номер_пасажира = Пасажири.id WHERE Номер_квитка = '$Номер_квитка';";
        $result = $connection->query($sql);
        $row = $result ->fetch_assoc();
        echo "
        <br>
        <h3>Редагуємо дане поле<h3>
        <br>
        <table class='styled-table'>
            <thead>
                <th>Номер квитка</th>
                <th>Номер маршруту</th>
                <th>Номер День відправлення</th>
                <th>Номер потягу</th>
                <th>Номер вагону</th>
                <th>Номер місця</th>
                <th>Прізвище пасажира</th>
                <th>Ім'я пасажира</th>
                <th>Наявність пільги</th>
                <th>Ціна</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row[Номер_квитка]</td>
                    <td>$row[Номер_маршруту]</td>
                    <td>$row[День_відправлення]</td>
                    <td>$row[Номер_потягу]</td>
                    <td>$row[Номер_вагону]</td>
                    <td>$row[Номер_місця]</td>
                    <td>$row[Прізвище_пасажира]</td>
                    <td>$row[Імя_пасажира]</td>
                    <td>$row[Наявність_пільги]</td>
                    <td>$row[Ціна]</td>
                    </tr>
            </tbody>
        </table>
        ";
        echo "
        <form action=\"edit_tickets_process.php\" method='post'>
        <input type='hidden' id='номер_квитка' name='номер_квитка' value='$row[Номер_квитка]'><br>
        <label for=\"fname\">Номер маршруту:</label><br>
        <input type=\"text\" id=\"номер_маршруту\" name=\"номер_маршруту\"><br>
        <label for=\"fname\">Номер дня відправлення:</label><br>
        <input type=\"text\" id=\"номер_дня_відправлення\" name=\"номер_дня_відправлення\"><br>
        <label for=\"fname\">Номер місця:</label><br>
        <input type=\"text\" id=\"номер_місця\" name=\"номер_місця\"><br>
        <label for=\"fname\">Номер потягу:</label><br>
        <input type=\"text\" id=\"номер_потягу\" name=\"номер_потягу\"><br>
        <label for=\"fname\">Номер вагону:</label><br>
        <input type=\"text\" id=\"номер_вагону\" name=\"номер_вагону\"><br>
        <label for=\"fname\">Номер пасажира:</label><br>
        <input type=\"text\" id=\"номер_пасажира\" name=\"номер_пасажира\"><br>
        <label for=\"fname\">Ціна:</label><br>
        <input type=\"text\" id=\"ціна\" name=\"ціна\"><br><br>
        <input type=\"submit\" value=\"Редагувати\">
      </form> " ;  
        mysqli_close($connection);
     ?>
     </main>
</body>