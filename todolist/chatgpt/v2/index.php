<?php
include 'db.php'; // Ensure no spaces or new lines before this

// Fetch tasks from the database
$result = $conn->query("SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html>
<head>
    <title>Task List</title>
</head>
<body>

<h1>My Task List</h1>

<!-- Add New Task Button -->
<a href="create.php">Add New Task</a>

<br><br>

<table border="1">
    <tr>
        <th>Task Name</th>
        <th>Description</th>
        <th>Deadline</th>
        <th>Status</th>
        <th>Completion Date</th>
        <th>Actions</th>
    </tr>

    <?php while($task = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo $task['task_name']; ?></td>
        <td><?php echo $task['description']; ?></td>
        <td><?php echo $task['deadline'] ? $task['deadline'] : 'No Deadline'; ?></td>
        <td><?php echo $task['is_done'] ? 'Done' : 'Not Done'; ?></td>
        <td>
            <?php
            if ($task['is_done']) {
                echo $task['completed_at'] ? $task['completed_at'] : 'No Date';
            } else {
                echo 'Not Completed Yet';
            }
            ?>
        </td>
        <td>
            <?php if (!$task['is_done']) { ?>
                <a href="mark_done.php?id=<?php echo $task['id']; ?>">Mark as Done</a>
            <?php } ?>
            <a href="update.php?id=<?php echo $task['id']; ?>">Update</a>
            <a href="delete.php?id=<?php echo $task['id']; ?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>