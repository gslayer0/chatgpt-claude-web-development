<?php
// ERROR: cannot redirect because cannot alter header
?>


<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task_name = $_POST['task_name'];
    $description = $_POST['description'];
    $deadline = $_POST['deadline'];

    $sql = "UPDATE tasks SET task_name = '$task_name', description = '$description', deadline = '$deadline' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $conn->error;
    }
}

$result = $conn->query("SELECT * FROM tasks WHERE id = $id");
$task = $result->fetch_assoc();
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