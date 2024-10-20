<!DOCTYPE html>
<html lang="en">
<?php include 'header.php'; // Include Bootstrap and custom styles ?>
<body>

<div class="container">
    <h1>Create a New Task</h1>

    <div class="form-container">
        <form method="POST" action="create.php">
            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" class="form-control" id="task_name" name="task_name" placeholder="Enter task name" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter task description"></textarea>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline</label>
                <input type="date" class="form-control" id="deadline" name="deadline">
            </div>

            <button type="submit" class="btn btn-custom">Create Task</button>
        </form>
    </div>
</div>

</body>
</html>