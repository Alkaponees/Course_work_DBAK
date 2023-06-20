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
        <h1> Відображення квитків</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="add_tickets_page.php">Додати квиток</a></div>
            <div class="item"><a href="search_tickets.php">Шукати квиток</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <form>
   <select name="sortBy">
    <option value="Квитки.Номер_квитка">Номер_квитка</option>
    <option value="Квитки.Номер_маршруту">Номер_маршруту</option>
    <option value="Квитки.Номер_дня_відправлення">Номер_дня_відправлення</option>
    <option value="Квитки.Номер_потягу">Номер_потягу</option>
    <option value="Квитки.Номер_вагону">Номер_вагону</option>
    <option value="Квитки.Номер_місця">Номер_місця</option>
    <option value="Квитки.Номер_пасажира">Номер_пасажира</option>
    <option value="Квитки.Ціна">Ціна</option>
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
        
        $sql = "SELECT DISTINCT Квитки.Номер_квитка, Маршрути.Номер_маршруту, 
        Дні_відправлення.День_відправлення, Потяги.Номер_потягу, Вагони.Номер_вагону, 
        Місця.Номер_місця, Пасажири.Імя_пасажира, Пасажири.Прізвище_пасажира, 
        Пасажири.Наявність_пільги, Квитки.Ціна FROM Квитки 
        JOIN Маршрути ON Квитки.Номер_маршруту = Маршрути.Номер_маршруту 
        JOIN Дні_відправлення ON Квитки.Номер_дня_відправлення = Дні_відправлення.id 
        JOIN Потяги ON Квитки.Номер_потягу = Потяги.Номер_потягу 
        JOIN Вагони ON Квитки.Номер_вагону = Вагони.id
        JOIN Місця ON Квитки.Номер_місця = Місця.id 
        JOIN Пасажири ON Квитки.Номер_пасажира = Пасажири.id";
        if($sortBy != NULL) {
            $sql .= ' ORDER BY ' . $sortBy;
           }
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Квитки" . $connection->error);
     }   
   
     
    while (($row = $result ->fetch_assoc())){
        echo "
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
                    <td class='active-row'>
                        <a  href='edit_tickets_page.php? Номер_квитка=" .$row['Номер_квитка']."'>Редагувати</a>
                        <a  href='delete_tickets.php? Номер_квитка=".$row['Номер_квитка']."'>Видалити</a>
                    </td>
                    </tr>
            </tbody>
        </table>
        ";
    }
    
    ?>

</main>
</body>