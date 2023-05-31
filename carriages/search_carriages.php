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
    
<title>Вагони</title>
</head>
<body>
    <header class="header">
        <h1> Пошук вагону</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="carriages.php">Вагони</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <h1> Пошук вагону</h1>
    <form method="POST" action="">
        <label for="condition">Номер потягу:</label><br><br>
        <input type="text" name="номер_потягу" id="номер_потягу" required><br><br>
        <button type="submit">Пошук</button>
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
        $номер_потягу = $_POST["номер_потягу"];
        // Create a connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }

        // Query the database with the specific condition
        $sql = "SELECT DISTINCT Вагони.id, Вагони.Номер_вагону, Потяги.Номер_потягу, Вагони.Тип_вагону, Вагони.Кількість_місць FROM Вагони
        JOIN Потяги ON Вагони.Номер_потягу = Потяги.Номер_потягу  WHERE Вагони.Номер_потягу=$номер_потягу "; // Replace 'your_table' with your table name and 'column_name' with the column to match against

        $result = $connection->query($sql);
        if (!$result) {
            die("Не вдалося знайти дані в таблиці Вагони" . $connection->error);
         }
        else{
            // Check if any rows were returned
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