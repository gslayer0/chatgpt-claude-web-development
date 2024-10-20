<?php
include 'db.php'; // Make sure to include your database connection

// Initialize variables for form handling
$id = $task_name = $description = $deadline = "";
$errors = [];

// Check if an ID is provided
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Fetch existing task details
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $task = $result->fetch_assoc();
        $task_name = $task['task_name'];
        $description = $task['description'];
        $deadline = $task['deadline'];
    } else {
        // Handle case where task is not found
        $errors[] = "Task not found.";
    }
    $stmt->close();
} else {
    $errors[] = "Invalid task ID.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $task_name = trim($_POST['task_name']);
    $description = trim($_POST['description']);
    $deadline = trim($_POST['deadline']);

    if (empty($task_name)) {
        $errors[] = "Task name is required.";
    }

    // If there are no errors, update the task in the database
    if (empty($errors)) {
        // Prepare the update query
        $sql = "UPDATE tasks SET task_name = ?, description = ?, deadline = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        
        // Create a null variable for the deadline
        $null = null;
        
        if (empty($deadline)) {
            // If no deadline is provided, bind NULL
            $stmt->bind_param("sssi", $task_name, $description, $null, $id);
        } else {
            // Otherwise, bind the deadline value
            $stmt->bind_param("sssi", $task_name, $description, $deadline, $id);
        }

        if ($stmt->execute()) {
            // Redirect to the index page after successful update
            header("Location: index.php");
            exit();
        } else {
            $errors[] = "Error: Could not update the task.";
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
    <title>Update Task</title>
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
        <h2 class="form-title">Update Task</h2>

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

        <!-- Task Update Form -->
        <form action="update.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
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

            <button type="submit" class="btn btn-custom btn-block">Update Task</button>
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