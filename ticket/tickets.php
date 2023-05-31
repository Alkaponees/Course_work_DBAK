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
        $sql = "SELECT DISTINCT Квитки.Номер_квитка, Маршрути.Номер_маршруту, 
        Дні_відправлення.День_відправлення, Потяги.Номер_потягу, Вагони.Номер_вагону, 
        Місця.Номер_місця, Пасажири.Імя_пасажира, Пасажири.Прізвище_пасажира, 
        Пасажири.Наявність_пільги, Квитки.Ціна FROM Квитки 
        JOIN Маршрути ON Квитки.Номер_маршруту = Маршрути.Номер_маршруту 
        JOIN Дні_відправлення ON Квитки.Номер_дня_відправлення = Дні_відправлення.id 
        JOIN Потяги ON Квитки.Номер_потягу = Потяги.Номер_потягу 
        JOIN Вагони ON Квитки.Номер_вагону = Вагони.id
        JOIN Місця ON Квитки.Номер_місця = Місця.id 
        JOIN Пасажири ON Квитки.Номер_пасажира = Пасажири.id ;";
        // $sql1 = "SELECT День_відправлення FROM Дні_відправлення";
        // $sql2 = "SELECT Прізвище_пасажира, Імя_пасажира, Наявність_пільги FROM Пасажири";
        $result = $connection->query($sql);
     if (!$result) {
        die("Не вдалося отримати дані з таблиці Квитки" . $connection->error);
     }   
    //  $result1 = $connection->query($sql1);
    //  if (!$result1) {
    //     die("Не вдалося отримати дані з таблиці Дні_відправлення" . $connection->error);
    //  }
    //  $result2 = $connection->query($sql2);
    //  if (!$result2) {
    //     die("Не вдалося отримати дані з таблиці Пасажири" . $connection->error);
    //  }   
    //  CREATE TABLE Квитки (
    //     Номер_квитка MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
    //     Номер_маршруту MEDIUMINT UNSIGNED,
    //     День_відправлення DATE, 	          	
    //     Номер_місця MEDIUMINT UNSIGNED, 
    //     Номер_потягу MEDIUMINT UNSIGNED,
    //     Номер_вагону MEDIUMINT UNSIGNED,
    //     Прізвище_пасажира VARCHAR(50),
    //         Імя_пасажира VARCHAR(50),
    //     Наявність_пільги ENUM(‘Так’, ‘Ні’),
    //     Ціна FLOAT,
    while (($row = $result ->fetch_assoc())){
        //&&($row1 = $result1 ->fetch_assoc())&&($row2 = $result2 ->fetch_assoc())){
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