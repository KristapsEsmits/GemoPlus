<?php
include 'backend/Auth.php';
require('backend/db_con.php');

if (isset($_REQUEST['nosaukums'])){

    $nosaukums = stripslashes($_REQUEST['nosaukums']);
	$nosaukums  = mysqli_real_escape_string($con,$nosaukums );

    $query = "INSERT INTO kategorijas (Nosaukums)
    VALUES ('$nosaukums')";
    $result = mysqli_query($con,$query);

    if($result){
      echo("<h1 id='veiksmigi'>Kategorija veiksmīgi pievienota!</h1>");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Preces</title>
        <link rel="icon" href="resources/favicons/fav.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;1,700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="resources/css/darbinieki.css"/>
    </head>
<body>
    <div class="Fields">
        <button id="add-btn">Pievienot Kategoriju</button>
        <form action="" method="post">
            <div id="add-pkategorija">
                <input name="nosaukums" type="text" class="input" placeholder="Nosaukums" required>
                <input class="btn" name=submit type="submit" value="Pievienot">
                <button id="close-btn">Atcelt</button>
            </div>
        </form>
    </div>
    <div class="list">
        <div class="tabulaBox">
            <table id="customers">
            <tr class="tabula">
                <th class="teksts">ID</th>
                <th class="teksts">Nosaukums</th>
            </tr>
            <?php
                $query = "SELECT * FROM kategorijas";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                echo "<tr class='tabula'>";
                echo "<td>" . $row['Kategorijas_ID'] . "</td>";    
                echo "<td>" . $row['Nosaukums'] . "</td>";          
                echo "<td><a href='roll.html'><button id=dzest>Delete</button></a><br><a href='roll.html'><button id=labot>Update</button></a></td>";
                echo "</tr>";        
                }          
            echo "</table>";
            mysqli_close($con);
            ?>
        </div>
    </div>
    <script src="resources/js/darbinieki.js"></script>
</body>
</html>