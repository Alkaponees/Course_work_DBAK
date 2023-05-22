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
        <h1> Додати місце</h1>
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
    $sql2 = "SELECT * FROM Вагони;";
    $result2=$connection->query($sql2);

 if (!$result2) {
    die("Не вдалося отримати дані з таблиці Потяги" . $connection->error);
 } 
 echo "<br>
 <form action='add_places_process.php' method='post'>
 <label for='fname'>Номер Потягу:</label><br>
 <input type='text' id='Номер_потягу' name='Номер_потягу'><br>
 <label for='fname'>Номер вагону: </label><br>
 <input type='text' id='Номер_вагону' name='Номер_вагону'><br>
 <label for='lname'>Номер місця:</label><br>
 <input type='text' id='Номер_місця' name='Номер_місця'><br>
 <label for='lname'>Статус_місця (Приклад: Заброньовано, Вільне): </label><br>
 <input type='text' id='Статус_місця' name='Статус_місця'><br><br>
 <input type='submit' value='Додати'>
</form> " ;
    echo "
    <h3>Вагони</h3>";
       while ($row2 = $result2 ->fetch_assoc()){
        echo "
        <table class='styled-table'>
            <thead>
                <th>id</th>
                <th>Номер вагону</th>
                <th>Номер потягу</th>
                <th>Кількість місць</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row2[id]</td>
                    <td>$row2[Номер_вагону]</td>
                    <td>$row2[Номер_потягу]</td>
                    <td>$row2[Кількість_місць]</td>
                    </tr>
            </tbody>
        </table>
        ";
       } 
    
        mysqli_close($connection);
     ?>
     </main>
</body>