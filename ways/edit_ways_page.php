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
        <h1> Редагувати маршрут</h1>
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
    $номер_маршруту=$_GET['Номер_маршруту'];    
    $sql = "SELECT * FROM Маршрути WHERE Номер_маршруту = $номер_маршруту";
    $result = $connection->query($sql);
    $row = $result ->fetch_assoc();
    
    echo "
        <table class='styled-table'>
            <thead>
                <th>Номер маршруту</th>
                <th>Пункт відправлення</th>
                <th>Пункт призначення</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row[Номер_маршруту]</td>
                    <td>$row[Пункт_відправлення]</td>
                    <td>$row[Пункт_призначення]</td>
                    </tr>
            </tbody>
        </table>
        ";
     echo "
     <form action='edit_ways_process.php' method='POST'>
     <input type='hidden' id='номер_маршруту' name='номер_маршруту' value='$row[Номер_маршруту]'><br>
     <label for='fname'>Пункт відправлення:</label><br>
     <input type='text' id='пункт_відправлення' name='пункт_відправлення'><br>
     <label for='lname'>Пункт призначення:</label><br>
     <input type='text' id='пункт_призначення' name='пункт_призначення'><br><br>
     <input type='submit' value='Редагувати'>
   </form> " ;
        mysqli_close($connection);
     ?>
     </main>
</body>