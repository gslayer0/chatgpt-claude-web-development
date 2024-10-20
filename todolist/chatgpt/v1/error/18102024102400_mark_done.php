<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

$sql = "UPDATE tasks SET is_done = 1 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $conn->error;
}
?>