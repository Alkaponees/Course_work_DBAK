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
        <h1> Пошук квитка</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="tickets.php">Квитки</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <h1>Пошук квитка</h1>
    <form method="POST" action="">
        <label for="condition">Номер_квитка:</label><br><br>
        <input type="text" name="номер_квитка" id="номер_квитка" required><br><br>
        <button type="submit">Пошук</button><br><br>
    </form>

    <?php
    // Database connection details
    $servername = 'localhost';
    $username   = 'root';
    $password   = 'ALk4p@nees0_7';
    $database   = 'railway_station';

    //  Створюємо з'єднання
    

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $номер_квитка = $_POST["номер_квитка"]; // Get the condition value from the form
       
        // Create a connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }

        // Query the database with the specific condition
        $sql = "SELECT DISTINCT Квитки.Номер_квитка, Маршрути.Номер_маршруту, 
        Дні_відправлення.День_відправлення, Потяги.Номер_потягу, Вагони.Номер_вагону, 
        Місця.Номер_місця, Пасажири.Імя_пасажира, Пасажири.Прізвище_пасажира, 
        Пасажири.Наявність_пільги, Квитки.Ціна FROM Квитки 
        JOIN Маршрути ON Квитки.Номер_маршруту = Маршрути.Номер_маршруту 
        JOIN Дні_відправлення ON Квитки.Номер_дня_відправлення = Дні_відправлення.id 
        JOIN Потяги ON Квитки.Номер_потягу = Потяги.Номер_потягу 
        JOIN Вагони ON Квитки.Номер_вагону = Вагони.id
        JOIN Місця ON Квитки.Номер_місця = Місця.id 
        JOIN Пасажири ON Квитки.Номер_пасажира = Пасажири.id WHERE Номер_квитка = '$номер_квитка';"; // Replace 'your_table' with your table name and 'column_name' with the column to match against

        $result = $connection->query($sql);
        if (!$result) {
            die("Не вдалося знайти дані в таблиці Квитка" . $connection->error);
         }
        else{
            // Check if any rows were returned
        while ($row = $result ->fetch_assoc()){
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
                    </tr>
            </tbody>
        </table>
            ";
        }
        }
         
            mysqli_close($connection);
    }
    ?>
    </main>
</body>
</html>