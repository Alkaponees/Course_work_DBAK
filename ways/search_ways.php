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
    
<title>Маршрути</title>
</head>
<body>
    <header class="header">
        <h1> Пошук маршруту</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="ways.php">Маршрути</a></div>
            <div class="animation start-home"></div>
            </nav>
	</header>
    <main>
    <h1>Пошук маршруту</h1>
    <form method="POST" action="">
        <label for="condition">Пункт_відправлення:</label><br><br>
        <input type="text" name="пункт_відправлення" id="пункт_відправлення" required><br><br>
        <label for="condition">Пункт_призначення:</label><br><br>
        <input type="text" name="пункт_призначення" id="пункт_призначення" required><br><br>
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
        $пункт_відправлення = $_POST["пункт_відправлення"]; // Get the condition value from the form
        $пункт_призначення = $_POST["пункт_призначення"];
        // Create a connection
        $connection = new mysqli($servername, $username, $password, $database);

        // Перевіряємо з'єднання
        if ($connection->connect_error) {
            die("Не вдалося з'єднатися із сервером" . $connection -> connect_error);
        }

        // Query the database with the specific condition
        $sql = "SELECT * FROM Маршрути WHERE пункт_відправлення= '$пункт_відправлення' AND пункт_призначення='$пункт_призначення'"; // Replace 'your_table' with your table name and 'column_name' with the column to match against

        $result = $connection->query($sql);
        if (!$result) {
            die("Не вдалося знайти дані в таблиці Маршрути" . $connection->error);
         }
        else{
            // Check if any rows were returned
        while ($row = $result ->fetch_assoc()){
            echo "
            <table class='styled-table'>
                <thead>
                    <th>Номер маршруту</th>
                    <th>Пункт відправлення</th>
                    <th>Пункт призначення</th>
                </thead>
                <tbody>
                    <tr>
                        <td>$row[Номер_маршруту]</td>
                        <td>$row[Пункт_відправлення]</td>
                        <td>$row[Пункт_призначення]</td>
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