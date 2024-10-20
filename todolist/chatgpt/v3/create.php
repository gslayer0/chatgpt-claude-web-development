<?php
include 'db.php'; // Ensure no spaces or new lines before this

// Initialize variables
$task_name = '';
$description = '';
$deadline = null; // Set to null by default

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input
    $task_name = $_POST['task_name'] ?? '';
    $description = $_POST['description'] ?? '';

    // Check if deadline is set and is not empty; set to null if empty
    $deadlineInput = $_POST['deadline'] ?? '';
    $deadline = !empty($deadlineInput) ? $deadlineInput : null;

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tasks (task_name, description, deadline) VALUES (?, ?, ?)");
    
    // Check if preparation was successful
    if ($stmt) {
        // Bind parameters
        // Use "sss" to bind the third parameter as string (it can be NULL)
        $stmt->bind_param("sss", $task_name, $description, $deadline);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: index.php"); // Redirect on success
            exit; // Ensure no further code is executed
        } else {
            echo "Error executing statement: " . $stmt->error;
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h1>Create a New Task</h1>
    <form method="post" action="">
        <div class="form-group">
            <label for="task_name">Task Name</label>
            <input type="text" class="form-control" id="task_name" name="task_name" required value="<?php echo htmlspecialchars($task_name, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?></textarea>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo htmlspecialchars($deadline, ENT_QUOTES, 'UTF-8'); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>