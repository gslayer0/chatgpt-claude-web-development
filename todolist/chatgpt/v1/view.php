<?php include 'db.php'; ?>

<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id = $id");
$task = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Task Details</title>
</head>
<body>

<h1>Task Details</h1>
<p><strong>Task Name:</strong> <?php echo $task['task_name']; ?></p>
<p><strong>Description:</strong> <?php echo $task['description']; ?></p>
<p><strong>Deadline:</strong> <?php echo $task['deadline']; ?></p>
<p><strong>Status:</strong> <?php echo $task['is_done'] ? 'Done' : 'Pending'; ?></p>

<a href="index.php">Back to List</a>

</body>
</html>