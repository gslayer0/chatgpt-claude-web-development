<?php 
// ERROR: cannot redirect because header cannot be altered
?>

<?php include 'db.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : NULL;

    // Prepare the SQL statement to handle NULL for the deadline
    $sql = "INSERT INTO tasks (task_name, description, deadline) VALUES ('$task_name', '$description', " . ($deadline ? "'$deadline'" : "NULL") . ")";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>

<h1>Create a new task</h1>
<form method="POST">
    <label>Task Name:</label>
    <input type="text" name="task_name" required><br>

    <label>Description:</label>
    <textarea name="description" required></textarea><br>

    <label>Deadline (optional):</label>
    <input type="date" name="deadline"><br>

    <button type="submit">Create Task</button>
</form>

</body>
</html>