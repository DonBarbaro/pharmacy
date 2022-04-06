<?php
include 'header.php';
include 'connectdb.php';
?>
<form action="" method="get">
Názov výrobcu: <input type="text" name="nazov_vyrobcu">
<input type="submit" value="Nájdi">
</form>
<?php
if(isset($_GET["nazov_vyrobcu"])){
    $search1 = 'SELECT * FROM Vyrobca WHERE Nazov LIKE "%'.$_GET["nazov_vyrobcu"].'%"';
}
else{
    $search1='';
}
if ($result6 = mysqli_query($conn, $search1)){
    if(mysqli_num_rows($result6) > 0){
        echo '<table style="width:40%; border: 1px solid black; text-align: center">';
            echo "<tr>";
                echo "<th>ID Výrobca</th>";
                echo "<th>Názov</th>";
                echo "<th>Sídlo</th>";
            echo "</tr>";
        while($row6 = mysqli_fetch_array($result6)){
            $typ6 = ($row6["Typ"]==0 ? 'Syrup' : 'Tablety');
            echo "<tr>";
                echo "<td>" .$row6['ID_vyrobca']. "</td>";
                echo "<td>" .$row6['Nazov']. "</td>";
                echo "<td>" .$row6['Sidlo']. "</td>";
                echo "<td><a href='deleteproducer.php?id=".$row6['ID_vyrobca']."'>Vymazať</a></td>";
            echo "</tr>";
        }
        echo "<table>";
        mysqli_free_result($result6);
    }
    else{
        echo "Nenašiel sa zaznam";
    }
}
$sqlselect2 = "SELECT * FROM Vyrobca";
if ($result2 = mysqli_query($conn, $sqlselect2)){
    if(mysqli_num_rows($result2) > 0){
        echo '<table style="width:40%; border: 1px solid black; text-align: center">';
            echo "<tr>";
                echo "<th>ID Výrobca</th>";
                echo "<th>Názov</th>";
                echo "<th>Sídlo</th>";
            echo "</tr>";
        while($row2 = mysqli_fetch_array($result2)){
            echo "<tr>";
                echo "<td>" .$row2['ID_vyrobca']. "</td>";
                echo "<td>" .$row2['Nazov']. "</td>";
                echo "<td>" .$row2['Sidlo']. "</td>";
                    echo "<td><a href='deleteproducer.php?id=".$row2['ID_vyrobca']."'>Vymazať</a></td>";
            echo "</tr>";
        }
        echo "<table>";
        mysqli_free_result($result2);
    }
    else{
        echo "Nenašiel sa zaznam";
    }
}
    else{
        echo "Chyba: nepodarilo sa vykonat $sqlselect2. " . mysqli_error($conn);
    }
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>