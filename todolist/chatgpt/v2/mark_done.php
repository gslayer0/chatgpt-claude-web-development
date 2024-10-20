<?php
include 'db.php'; // Ensure no spaces or new lines before this

// Start output buffering to prevent any accidental output before header()
ob_start();

$id = $_GET['id'];

// Get the current date and time
$completed_at = date('Y-m-d H:i:s');

// Update the task to mark it as done and save the completion date
$sql = "UPDATE tasks SET is_done = 1, completed_at = '$completed_at' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php'); // Redirect to index.php after marking task as done
    exit(); // Always exit after a header redirect
} else {
    echo "Error: " . $conn->error;
}

ob_end_flush(); // End output buffering and flush the output
?>