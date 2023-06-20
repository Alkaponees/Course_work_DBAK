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
        <h1> Відображення потягів</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_trains_page.php">Додати потяг</a></div>
            <div class="item"><a href="search_trains.php">Шукати потяг</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <form>
   <select name="sortBy">
    <option value="Номер_потягу">Номер_потягу</option>
    <option value="Кількість_вагонів">Кількість_вагонів</option>
    <option value="Тип_потягу">Тип_потягу</option>
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
        $sortBy = (isset($_POST['sortBy']) ? $_POST['sortBy'] : NULL);
        
        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }
        $sql = "SELECT * FROM Потяги";
        if($sortBy != NULL) {
            $sql .= ' ORDER BY ' . $sortBy;
           }
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Маршрути" . $connection->error);
     }   
    
    while ($row = $result ->fetch_assoc()){
        echo"
        <table class='styled-table'>
            <thead>
                <th>Номер Потягу</th>
                <th>Кількість вагонів</th>
                <th>Тип потягу</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row[Номер_потягу]</td>
                    <td>$row[Кількість_вагонів]</td>
                    <td>$row[Тип_потягу]</td>
                    <td class='active-row'>
                        <a  href='edit_trains_page.php?Номер_потягу=" .$row['Номер_потягу']."'>Редагувати</a>
                        <a  href='delete_trains.php?Номер_потягу=".$row['Номер_потягу']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    
    ?>

</main>
</body>