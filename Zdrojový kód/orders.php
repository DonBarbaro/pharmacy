<?php
include 'header.php';
include 'connectdb.php';

$sqlselect3 = "SELECT * FROM Lieky WHERE kos = '1'";
if ($result3 = mysqli_query($conn, $sqlselect3)){
    if(mysqli_num_rows($result3) > 0){
        echo '<table style="width:40%; border: 1px solid black; text-align: center">';
            echo "<tr>";
                echo "<th>ID Liek</th>";
                echo "<th>Názov</th>";
                echo "<th>Cena</th>";
                echo "<th>Typ</th>";
            echo "</tr>";
        while($row3 = mysqli_fetch_array($result3)){
            $typ3 = ($row3["Typ"]==0 ? 'Syrup' : 'Tablety');
            echo "<tr>";
                echo "<td>" .$row3['ID_liek']. "</td>";
                echo "<td>" .$row3['Nazov']. "</td>";
                echo "<td>" .$row3['Cena']. "</td>";
                echo "<td>" .$typ3. "</td>";
                    echo "<td><a href='deleteorder.php?id=".$row3['ID_liek']."'>Vymazať z objednávky</a></td>";
            echo "</tr>";
        }
        echo "<table>";
        mysqli_free_result($result3);
    }
    else{
        echo "<p> <font color=blue size='5pt'>Košík je prázdny</font> </p>";
    }
}
    else{
        echo "Chyba: nepodarilo sa vykonat $sqlselect3. " . mysqli_error($conn);
    }
mysqli_close($conn);
?>
<?php
include 'footer.php';
?>