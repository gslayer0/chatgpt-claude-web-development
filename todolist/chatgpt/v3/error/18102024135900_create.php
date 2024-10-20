<?php
include 'db.php'; // Make sure to include your database connection

// Initialize variables for form handling
$task_name = $description = $deadline = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $task_name = trim($_POST['task_name']);
    $description = trim($_POST['description']);
    $deadline = trim($_POST['deadline']);

    if (empty($task_name)) {
        $errors[] = "Task name is required.";
    }

    // If there are no errors, insert the task into the database
    if (empty($errors)) {
        $sql = "INSERT INTO tasks (task_name, description, deadline) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $task_name, $description, $deadline);

        if ($stmt->execute()) {
            // Redirect to the index page after successful creation
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Error: Could not save the task.";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Task</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
        }

        .form-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            text-align: center;
            margin-bottom: 20px;
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="form-title">Create New Task</h2>

        <!-- Display Errors -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Task Creation Form -->
        <form action="create.php" method="POST">
            <div class="form-group">
                <label for="task_name">Task Name</label>
                <input type="text" class="form-control" id="task_name" name="task_name" value="<?php echo htmlspecialchars($task_name); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($description); ?></textarea>
            </div>

            <div class="form-group">
                <label for="deadline">Deadline (optional)</label>
                <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo htmlspecialchars($deadline); ?>">
            </div>

            <button type="submit" class="btn btn-custom btn-block">Add Task</button>
        </form>

        <!-- Back to Task List Link -->
        <div class="text-center mt-3">
            <a href="index.php" class="btn btn-secondary">Back to Task List</a>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>