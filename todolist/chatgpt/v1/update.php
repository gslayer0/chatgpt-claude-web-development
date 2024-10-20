<?php
include 'db.php'; // Ensure no spaces or new lines before this

// Start output buffering to prevent any accidental output before header()
ob_start();

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : NULL;

    // Prepare the SQL statement to handle NULL for the deadline
    $sql = "UPDATE tasks SET task_name = '$task_name', description = '$description', deadline = " . ($deadline ? "'$deadline'" : "NULL") . " WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect to index.php after successful update
        exit(); // Always exit after a header redirect
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM tasks WHERE id = $id");
$task = $result->fetch_assoc();

ob_end_flush(); // End output buffering and flush the output
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Task</title>
</head>
<body>

<h1>Update Task</h1>
<form method="POST">
    <label>Task Name:</label>
    <input type="text" name="task_name" value="<?php echo $task['task_name']; ?>" required><br>

    <label>Description:</label>
    <textarea name="description" required><?php echo $task['description']; ?></textarea><br>

    <label>Deadline (optional):</label>
    <input type="date" name="deadline" value="<?php echo $task['deadline']; ?>"><br>

    <button type="submit">Update Task</button>
</form>

</body>
</html>