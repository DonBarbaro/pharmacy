<?php
include 'header.php';
$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM Lieky WHERE ID_liek = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
} else {
    echo "Error deleting record";
}
echo "Liek bol uspešné vymazaný"; 
echo "<br><td><a href='medicinelist.php'>Naspät</a></td>";
?>
<?php
include 'footer.php';
?>