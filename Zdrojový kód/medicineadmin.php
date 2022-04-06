<?php
include 'header.php';
?>
<form method="post" action="/ilas/public_html/medicineadmin.php">
Kód lieku:<br>
    <input type="text" name="kod_lieku" required><br>
Názov lieku:<br>
    <input type="text" name="nazov_lieku" required><br>
Cena:<br>
    <input type="text" name="cena" required><br>
Typ:<br>
    <select name="typ">
        <option value="0">Sirup</option>
        <option value="1">Tablety</option>
    </select> <br>
    <input type="submit" value="Vložit liek"><br>
</form>

<?php
include 'connectdb.php';
if (!empty($_POST)){
    if(!empty($_POST['kod_lieku']) && !empty($_POST['nazov_lieku']) && !empty($_POST['cena']) &&  isset($_POST['typ'])){
    $sql="INSERT INTO `ilas`.`Lieky` (`ID_liek`, `Nazov`, `Cena`, `Typ`) VALUES ('".$_POST['kod_lieku']."', '".$_POST['nazov_lieku']."',  '".$_POST['cena']."', '".$_POST['typ']."');";
        if ($conn->query($sql) === TRUE){
            echo "<br>Liek ".$_POST['nazov_lieku']." bolo pridaný!<br>";
        }
        else{
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    $conn->close();
    }
    else{
    echo "<br>Nekorektne data z formulara<br>";
    }
}
?>
<?php
include 'footer.php';
?>
