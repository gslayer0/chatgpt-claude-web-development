<?php
include 'db.php'; // Ensure no spaces or new lines before this

// Start output buffering to prevent any accidental output before header()
ob_start();

$id = $_GET['id'];

// Delete the task from the database
$sql = "DELETE FROM tasks WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php'); // Redirect to index.php after successful deletion
    exit(); // Always exit after a header redirect
} else {
    echo "Error: " . $conn->error;
}

ob_end_flush(); // End output buffering and flush the output
?>