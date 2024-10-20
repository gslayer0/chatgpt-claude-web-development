<?php
include 'db.php'; // Ensure no spaces or new lines before this

// Fetch tasks from the database
$result = $conn->query("SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .button-group a {
            display: block; /* Make buttons occupy full width */
            width: 100%; /* Set width to 100% */
            margin: 5px 0; /* Add some margin for spacing */
        }
    </style>
</head>
<body>

<div class="container">
    <h1 class="my-4">My Task List</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task Name</th>
                <th>Description</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Completion Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($task = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($task['task_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($task['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo $task['deadline'] ? htmlspecialchars($task['deadline'], ENT_QUOTES, 'UTF-8') : 'No Deadline'; ?></td>
                <td><?php echo $task['is_done'] ? 'Done' : 'Not Done'; ?></td>
                <td>
                    <?php
                    if ($task['is_done']) {
                        echo htmlspecialchars($task['completed_at'] ?? '', ENT_QUOTES, 'UTF-8') ?: 'No Date';
                    } else {
                        echo 'Not Completed Yet';
                    }
                    ?>
                </td>
                <td class="button-group">
                    <?php if (!$task['is_done']) { ?>
                        <a href="mark_done.php?id=<?php echo $task['id']; ?>" class="btn btn-success btn-sm">Mark as Done</a>
                    <?php } ?>
                    <a href="update.php?id=<?php echo $task['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="create.php" class="btn btn-primary btn-block">Add New Task</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>