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
        $sql = "SELECT * FROM Квитки WHERE Номер_квитка = $Номер_квитка";
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
                <th>День відправлення</th>
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
        <label for=\"fname\">День відправлення:</label><br>
        <input type=\"text\" id=\"день_відправлення\" name=\"день_відправлення\"><br>
        <label for=\"fname\">Номер місця:</label><br>
        <input type=\"text\" id=\"номер_місця\" name=\"номер_місця\"><br>
        <label for=\"fname\">Номер потягу:</label><br>
        <input type=\"text\" id=\"номер_потягу\" name=\"номер_потягу\"><br>
        <label for=\"fname\">Номер вагону:</label><br>
        <input type=\"text\" id=\"номер_вагону\" name=\"номер_вагону\"><br>
        <label for=\"fname\">Прізвище пасажира:</label><br>
        <input type=\"text\" id=\"прізвище_пасажира\" name=\"прізвище_пасажира\"><br>
        <label for=\"fname\">Ім'я пасажира:</label><br>
        <input type=\"text\" id=\"імя_пасажира\" name=\"імя_пасажира\"><br>
        <label for=\"fname\">Наявність пільги:</label><br>
        <input type=\"text\" id=\"наявність_пільги\" name=\"наявність_пільги\"><br>
        <label for=\"fname\">Ціна:</label><br>
        <input type=\"text\" id=\"ціна\" name=\"ціна\"><br><br>
        <input type=\"submit\" value=\"Редагувати\">
      </form> " ;  
        mysqli_close($connection);
     ?>
     </main>
</body>