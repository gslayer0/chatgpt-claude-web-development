<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Add New List</h1>
        <form action="index.php?action=add" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline">

            <label for="description">Description:</label>
            <textarea id="description" name="description"></textarea>

            <div class="form-buttons">
                <input type="submit" value="Add List" class="btn">
                <a href="index.php" class="btn">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>