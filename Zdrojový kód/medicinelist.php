<?php
include 'header.php';
include 'connectdb.php';
?>
<form action="" method="get">
Názov produktu: <input type="text" name="nazov">
<input type="submit" value="Nájdi">
</form>
<?php
if(isset($_GET["nazov"])){
    $search = 'SELECT * FROM Lieky WHERE nazov LIKE "%'.$_GET["nazov"].'%"';
}
else{
    $search='';
}
if ($result5 = mysqli_query($conn, $search)){
    if(mysqli_num_rows($result5) > 0){
        echo '<table style="width:40%; border: 1px solid black; text-align: center">';
            echo "<tr>";
                echo "<th>ID Liek</th>";
                echo "<th>Názov</th>";
                echo "<th>Cena</th>";
                echo "<th>Typ</th>";
            echo "</tr>";
        while($row5 = mysqli_fetch_array($result5)){
            $typ5 = ($row5["Typ"]==0 ? 'Syrup' : 'Tablety');
            echo "<tr>";
                echo "<td>" .$row5['ID_liek']. "</td>";
                echo "<td>" .$row5['Nazov']. "</td>";
                echo "<td>" .$row5['Cena']. "</td>";
                echo "<td>" .$typ5. "</td>";
                    echo "<td><a href='deletemedicine.php?id=".$row5['ID_liek']."'>Vymazať</a></td>";
                    echo "<td><a href='ordermedicine.php?id=".$row5['ID_liek']."'>Objednať</a></td>";
            echo "</tr>";
        }
        echo "<table>";
        mysqli_free_result($result5);
    }
    else{
        echo "Nenašiel sa zaznam";
    }
}
$sqlselect = "SELECT * FROM Lieky";
if ($result = mysqli_query($conn, $sqlselect)){
    if(mysqli_num_rows($result) > 0){
        echo '<table style="width:40%; border: 1px solid black; text-align: center">';
            echo "<tr>";
                echo "<th>ID Liek</th>";
                echo "<th>Názov</th>";
                echo "<th>Cena</th>";
                echo "<th>Typ</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            $typ = ($row["Typ"]==0 ? 'Syrup' : 'Tablety');
            echo "<tr>";
                echo "<td>" .$row['ID_liek']. "</td>";
                echo "<td>" .$row['Nazov']. "</td>";
                echo "<td>" .$row['Cena']. "</td>";
                echo "<td>" .$typ. "</td>";
                    echo "<td><a href='deletemedicine.php?id=".$row['ID_liek']."'>Vymazať</a></td>";
                    echo "<td><a href='ordermedicine.php?id=".$row['ID_liek']."'>Objednať</a></td>";
            echo "</tr>";
        }
        echo "<table>";
        mysqli_free_result($result);
    }
    else{
        echo "Nenašiel sa zaznam";
    }
}
    else{
        echo "Chyba: nepodarilo sa vykonat $sqlselect. " . mysqli_error($conn);
    }
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>
