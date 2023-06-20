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
    
<title>Вагонів</title>
</head>
<body>
    <header class="header">
        <h1> Відображення вагонів</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_carriages_page.php">Додати вагон</a></div>
            <div class="item"><a href="search_carriages.php">Шукати вагон</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <form>
   <select name="sortBy">
    <option value="Вагони.Id">ID</option>
    <option value="Вагони.Номер_вагону">Номер_вагону</option>
    <option value="Вагони.Номер_потягу">Номер_потягу</option>
    <option value="Вагони.Тип_вагону">Тип_вагону</option>
    <option value="Вагони.Кількість_місць">Кількість_місць</option>
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
        $sql = "SELECT DISTINCT Вагони.id, Вагони.Номер_вагону, Потяги.Номер_потягу, Вагони.Тип_вагону, Вагони.Кількість_місць FROM Вагони
        JOIN Потяги ON Вагони.Номер_потягу = Потяги.Номер_потягу ";
        if($sortBy != NULL) {
            $sql .= ' ORDER BY ' . $sortBy;
           }
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Вагонів" . $connection->error);
     }   
    
    while ($row = $result ->fetch_assoc()){
        echo "
        <table class='styled-table'>
            <thead>
                <th>id</th>
                <th>Номер вагону</th>
                <th>Номер потягу</th>
                <th>Тип потягу</th>
                <th>Кількість місць</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row[id]</td>
                    <td>$row[Номер_вагону]</td>
                    <td>$row[Номер_потягу]</td>
                    <td>$row[Тип_вагону]</td>
                    <td>$row[Кількість_місць]</td>
                    <td class='active-row'>
                        <a  href='edit_carriages_page.php? id=" .$row['id']."'>Редагувати</a>
                        <a  href='delete_carriages.php? id=".$row['id']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    
    ?>

</main>
</body>