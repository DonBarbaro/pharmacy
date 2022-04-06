<?php
include 'header.php';
?>
<form method="post" action="/ilas/public_html/produceradmin.php">
Kód výrobcu:<br>
    <input type="text" name="kod_vyrobcu" required><br>
Názov výrobcu:<br>
    <input type="text" name="nazov_vyrobcu" required><br>
Sídlo (krajina):<br>
    <input type="text" name="sidlo" required><br>
<input type="submit" value="Vložit výrobcu"><br>
</form>

<?php
include 'connectdb.php';
if (!empty($_POST)){
    if(!empty($_POST['kod_vyrobcu']) && !empty($_POST['nazov_vyrobcu']) && !empty($_POST['sidlo'])){
        $sql="INSERT INTO `ilas`.`Vyrobca` (`ID_vyrobca`, `Nazov`, `Sidlo`) VALUES ('".$_POST['kod_vyrobcu']."', '".$_POST['nazov_vyrobcu']."', '".$_POST['sidlo']."');";
        if ($conn->query($sql) === TRUE){
            echo "<br>Výrobca ".$_POST['nazov_vyrobcu']." pridaný!";
        }
        else{
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }   
    else{
        echo "<br>Nekorektné dáta z formulára";
    }
}
?>
<?php
include 'footer.php';
?>