<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New List</title>
</head>
<body>
    <h1>Add New List</h1>
    <form action="index.php?action=add" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea><br>

        <input type="submit" value="Add List">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
