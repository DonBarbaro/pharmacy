<?php
include 'header.php';
$id = $_GET['id'];
include 'connectdb.php';
$sql = "DELETE FROM Vyrobca WHERE ID_vyrobca = $id"; 

if (mysqli_query($conn, $sql)) {
    mysqli_close($conn);
} else {
    echo "Error deleting record";
}
echo "Výrobca uspešné zmazaný";
echo "<br><td><a href='producerlist.php'>Naspäť</a></td>";
?>
<?php
include 'footer.php';
?>