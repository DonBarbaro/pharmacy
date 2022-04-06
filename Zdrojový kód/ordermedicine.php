<?php
include 'header.php';
include 'connectdb.php';
$id = $_GET['id'];
$sqlupdate = "UPDATE Lieky SET kos = '1' WHERE ID_liek = $id "; 

if (mysqli_query($conn, $sqlupdate)) {
    mysqli_close($conn);
} else {
    echo "Error update record";
}
    echo "Produkt bol pridaný do košíka.";
    echo "<br><td><a href='medicinelist.php'>Naspät k nákupu</a></td>";
    echo "<br><td><a href='orders.php'>Prejsť do košíka</a></td>";
?>
<?php
include 'footer.php';
?>