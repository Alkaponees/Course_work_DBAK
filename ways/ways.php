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
        <h1> Відображення маршрутів</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_ways_page.php">Додати машрут</a></div>
            <div class="item"><a href="search_ways.php">Шукати машрут</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
<form>
   <select name="sortBy">
    <option value="Номер_маршруту">Номер_маршруту</option>
    <option value="Пункт_відправлення">Пункт_відправлення</option>
    <option value="Пункт_призначення">Пункт_призначення</option>
   </select>
   <button type="submit" formaction="?" formmethod="post">Сортувати</button>
  </form>
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
        $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
        $sql = "SELECT * FROM Маршрути";
        if($sortBy != NULL) {
            $sql .= ' ORDER BY ' . $sortBy;
           }
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Маршрути" . $connection->error);
     }   
    while ($row = $result ->fetch_assoc()){
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
                    <td class='active-row'>
                        <a  href='edit_ways_page.php? Номер_маршруту=" .$row['Номер_маршруту']."'>Редагувати</a>
                        <a  href='delete_ways.php? Номер_маршруту=".$row['Номер_маршруту']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    ?>

</main>
</body>