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
        <h1> Редагувати інформацію про місце</h1>
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
        $id=$_GET['id'];    
        $sql = "SELECT * FROM Місця WHERE id = $id";
        $result = $connection->query($sql);
        $row = $result ->fetch_assoc();
        echo "
        <br>
        <h3>Редагуємо дане поле<h3>
        <br>
        <table class='styled-table'>
            <thead>
            <th>ID</th>
            <th>Номер потягу</th>
            <th>Номер вагону</th>
            <th>Номер місця</th>
            <th>Статус Місця</th>
            </thead>
            <tbody>
                <tr>
                <td>$row[id]</td>
                <td>$row[Номер_потягу]</td>
                <td>$row[Номер_вагону]</td>
                <td>$row[Номер_місця]</td>
                <td>$row[Статус_Місця]</td>
                    </tr>
            </tbody>
        </table>
        ";
     echo "<br>
     <form action='edit_places_process.php' method='post'>
     <input type='hidden' id='id' name='id' value='$row[id]'><br>
     <label for='fname'>Номер Потягу:</label><br>
     <input type='text' id='Номер_потягу' name='Номер_потягу'><br><br>
     <label for='fname'>Номер вагону: </label><br>
     <input type='text' id='Номер_вагону' name='Номер_вагону'><br><br>
     <label for='lname'>Номер місця: </label><br>
     <input type='text' id='Номер_місця' name='Номер_місця'><br><br>
     <label for='lname'>Статус місця (Приклад: Заброньовано, Вільне): </label><br>
     <input type='text' id='Статус_Місця' name='Статус_Місця'><br><br>
     <input type='submit' value='Редагувати'>
   </form> " ;
   
    $sql2 = "SELECT * FROM Вагони;";
    $result2=$connection->query($sql2);

 if (!$result2) {
    die("Не вдалося отримати дані з таблиці Потяги" . $connection->error);
 } 
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