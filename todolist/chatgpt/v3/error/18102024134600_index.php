<?php
// ERROR: backend is removed
?>


<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; // Include Bootstrap and custom styles ?>
<body>

<div class="container">
    <h1>To-Do List</h1>

    <!-- Add New Task Button -->
    <div class="mb-3 text-right">
        <a href="create.php" class="btn btn-custom">Add New Task</a>
    </div>

    <!-- Task List Table -->
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
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
                <td><?php echo htmlspecialchars($task['task_name']); ?></td>
                <td><?php echo htmlspecialchars($task['description']); ?></td>
                <td><?php echo $task['deadline'] ? $task['deadline'] : 'No Deadline'; ?></td>
                <td><?php echo $task['is_done'] ? 'Done' : 'Not Done'; ?></td>
                <td>
                    <?php echo $task['is_done'] ? $task['completed_at'] : 'Not Completed Yet'; ?>
                </td>
                <td>
                    <?php if (!$task['is_done']) { ?>
                        <a href="mark_done.php?id=<?php echo $task['id']; ?>" class="btn btn-success btn-sm">Mark as Done</a>
                    <?php } ?>
                    <a href="update.php?id=<?php echo $task['id']; ?>" class="btn btn-info btn-sm">Update</a>
                    <a href="delete.php?id=<?php echo $task['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Pagination if needed -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
          <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
            <a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php } ?>
      </ul>
    </nav>
</div>

</body>
</html>