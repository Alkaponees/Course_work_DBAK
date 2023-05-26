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
    
<title>Пасажири</title>
</head>
<body>
    <header class="header">
        <h1> Пошук пасажира</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="people.php">Пасажири</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <h1> Пошук пасажира</h1>
    <form method="POST" action="">
        <label for="condition">Номер пасажира:</label><br><br>
        <input type="text" name="номер_пасажира" id="номер_пасажира" required><br><br>
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
        $номер_пасажира = $_POST["номер_пасажира"]; // Get the condition value from the form
        // Create a connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }

        // Query the database with the specific condition
        $sql = "SELECT * FROM Пасажири WHERE id= $номер_пасажира "; // Replace 'your_table' with your table name and 'column_name' with the column to match against

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