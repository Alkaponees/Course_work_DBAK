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
        $sql = "SELECT DISTINCT Вагони.id, Вагони.Номер_вагону, Потяги.Номер_потягу, Вагони.Тип_вагону, Вагони.Кількість_місць FROM Вагони
        JOIN Потяги ON Вагони.Номер_потягу = Потяги.Номер_потягу ORDER BY Вагони.id;";
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