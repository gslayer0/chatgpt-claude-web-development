<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Todo List</title>
</head>
<body>

<h1>Todo List</h1>
<a href="create.php">Create a new task</a>
<table border="1">
    <tr>
        <th>Task Name</th>
        <th>Deadline</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    
    <?php
    $result = $conn->query("SELECT * FROM tasks");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['task_name'] . "</td>";
        echo "<td>" . $row['deadline'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . ($row['is_done'] ? 'Done' : 'Pending') . "</td>";
        echo "<td>
                <a href='view.php?id=" . $row['id'] . "'>View</a> |
                <a href='update.php?id=" . $row['id'] . "'>Update</a> |
                <a href='delete.php?id=" . $row['id'] . "'>Delete</a> |
                <a href='mark_done.php?id=" . $row['id'] . "'>Mark as Done</a>
              </td>";
        echo "</tr>";
    }
    ?>

</table>

</body>
</html>