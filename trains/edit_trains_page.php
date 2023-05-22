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
    
<title>Потяги</title>
</head>
<body>
    <header class="header">
        <h1> Редагувати потяги</h1>
        <nav>
            <div class="item"><a href="../index.html">Головна</a></div>
            <div class="item"><a href="trains.php">Потяги</a></div>
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
    $номер_потягу=$_GET['Номер_потягу'];    
    $sql = "SELECT * FROM Потяги WHERE Номер_потягу = $номер_потягу";
    $result = $connection->query($sql);
    $row = $result ->fetch_assoc();
    echo"
   <table class='styled-table'>
       <thead>
           <th>Номер Потягу</th>
           <th>Кількість вагонів</th>
           <th>Тип потягу</th>
       </thead>
       <tbody>
           <tr>
               <td>$row[Номер_потягу]</td>
               <td>$row[Кількість_вагонів]</td>
               <td>$row[Тип_потягу]</td>
               </tr>
       </tbody>
   </table> <br><br>
   ";
     echo "
     <form action='edit_trains_process.php' method='POST'>
     <input type='hidden' id='номер_потягу' name='номер_потягу' value='$row[Номер_потягу]'><br>
     <label for='lname'>Кількість вагонів:</label><br>
     <input type='text' id='кількість_вагонів' name='кількість_вагонів'><br>
     <label for='lname'>Тип потягу:</label><br>
     <input type='text' id='тип_потягу' name='тип_потягу'><br><br>
     <input type='submit' value='Редагувати'>
   </form> " ;
    
   
        mysqli_close($connection);
     ?>
     </main>
</body>