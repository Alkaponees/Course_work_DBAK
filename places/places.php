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
        <h1> Відображення місць</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_places_page.php">Додати місце</a></div>
            <div class="item"><a href="search_places.php">Шукати місце</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <form>
   <select name="sortBy">
    <option value="Місця.id">ID</option>
    <option value="Місця.Номер_вагону">Номер_вагону</option>
    <option value="Місця.Номер_потягу">Номер_потягу</option>
    <option value="Місця.Номер_місця">Номер_місця</option>
    <option value="Місця.Статус_Місця">Статус_Місця</option>
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
        $sql = "SELECT DISTINCT Місця.id, Вагони.Номер_вагону, Потяги.Номер_потягу ,Місця.Номер_місця ,Статус_Місця FROM Місця
        JOIN Потяги ON Місця.Номер_потягу = Потяги.Номер_потягу 
        JOIN Вагони ON Місця.Номер_вагону = Вагони.id
        ";
        if($sortBy != NULL) {
            $sql .= ' ORDER BY ' . $sortBy;
           }
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Місця" . $connection->error);
     }   
    
    while ($row = $result ->fetch_assoc()){
        echo "
        <table class='styled-table'>
            <thead>
                <th>id</th>
                <th>Номер вагону</th>
                <th>Номер потягу</th>
                <th>Номер місця</th>
                <th>Статус місця</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row[id]</td>
                    <td>$row[Номер_вагону]</td>
                    <td>$row[Номер_потягу]</td>
                    <td>$row[Номер_місця]</td>
                    <td>$row[Статус_Місця]</td>
                    <td class='active-row'>
                        <a  href='edit_places_page.php? id=" .$row['id']."'>Редагувати</a>
                        <a  href='delete_places.php? id=".$row['id']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    
    ?>

</main>
</body>