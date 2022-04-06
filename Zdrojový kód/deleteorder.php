<?php
include 'header.php';
include 'connectdb.php';
$id = $_GET['id'];
$sqlupdate = "UPDATE Lieky SET kos = 'NULL' WHERE ID_liek = $id "; 
if (mysqli_query($conn, $sqlupdate)) {
    mysqli_close($conn);
} else {
    echo "Error deleting record";
}
echo "Lieky uspešné zmazaný z objenávky";
echo "<br><td><a href='orders.php'>Naspäť do košíka</a></td>";
?>
<?php
include 'footer.php';
?>