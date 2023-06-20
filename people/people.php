<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel = "icon" href = 
    "images/railway.png" 
            type = "image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>Пасажири</title>
</head>
<body>
    <header class="header">
        <h1> Відображення пасажирів</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_people_page.php">Додати пасажира</a></div>
            <div class="item"><a href="search_people.php">Шукати пасажира</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <form>
   <select name="sortBy">
    <option value="Id">ID</option>
    <option value="Прізвище_пасажира">Прізвище_пасажира</option>
    <option value="Імя_пасажира">Імя_пасажира</option>
    <option value="Номер_телефону_пасажира">Номер_телефону_пасажира</option>
    <option value="Наявність_пільги">Наявність_пільги</option>
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
        $sql = "SELECT * FROM Пасажири";
        if($sortBy != NULL) {
            $sql .= ' ORDER BY ' . $sortBy;
           }
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Пасажири" . $connection->error);
     }   
    
    while ($row = $result ->fetch_assoc()){
        echo "
        <table class='styled-table'>
            <thead>
                <th>ID</th>
                <th>Прізвище пасажира</th>
                <th>Ім'я пасажира</th>
                <th>Номер телефону пасажира</th>
                <th>Наявність пільги</th>
            </thead>
            <tbody>
                <tr>
                    <td>$row[id]</td>
                    <td>$row[Прізвище_пасажира]</td>
                    <td>$row[Імя_пасажира]</td>
                    <td>$row[Номер_телефону_пасажира]</td>
                    <td>$row[Наявність_пільги]</td>
                    <td class='active-row'>
                        <a  href='edit_people_page.php? id=" .$row['id']."'>Редагувати</a>
                        <a  href='delete_people.php? id=".$row['id']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    
    ?>

</main>
</body>