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
    
<title>Дні відправлення</title>
</head>
<body>
    <header class="header">
        <h1> Пошук дня відправлення</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="days.php">День відправлення</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <h1>Пошук дня відправлення</h1>
    <form method="POST" action="">
        <label for="condition">День відправлення:</label><br><br>
        <input type="text" name="день_відправлення" id="день_відправлення" required><br><br>
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
        $день_відправлення = $_POST["день_відправлення"]; // Get the condition value from the form
        
        // Create a connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }

        // Query the database with the specific condition
        $sql = "SELECT * FROM Дні_відправлення WHERE День_відправлення= '$день_відправлення' "; // Replace 'your_table' with your table name and 'column_name' with the column to match against

        $result = $connection->query($sql);
        if (!$result) {
            die("Не вдалося знайти дані в таблиці Дні відправлення" . $connection->error);
         }
        else{
            // Check if any rows were returned
        while ($row = $result ->fetch_assoc()){
            echo "
            <table class='styled-table'>
            <thead>
            <th>ID</th>
            <th>Номер_потягу</th>
            <th>Номер_маршруту</th>
            <th>День_відправлення</th>
            <th>Час_відправлення</th>
            <th>Час_прибуття</th> 
            <th>Тривалість_маршруту</th>
            <th>Перелік_зупинок</th>
            </thead>
            <tbody>
                <tr>
                <td>$row[id]</td>
                <td>$row[Номер_потягу]</td>
                <td>$row[Номер_маршруту]</td>
                <td>$row[День_відправлення]</td>
                <td>$row[Час_відправлення]</td>
                <td>$row[Час_прибуття]</td>
                <td>$row[Тривалість_маршруту]</td>
                <td>$row[Перелік_зупинок]</td>
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