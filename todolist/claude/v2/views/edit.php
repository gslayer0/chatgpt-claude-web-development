<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit List</title>
</head>
<body>
    <h1>Edit List</h1>
    <form action="index.php?action=edit&id=<?= $list['id'] ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= htmlspecialchars($list['name']) ?>" required><br>

        <label for="deadline">Deadline:</label>
        <input type="date" id="deadline" name="deadline" value="<?= $list['deadline'] ?>"><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description"><?= htmlspecialchars($list['description']) ?></textarea><br>

        <input type="submit" value="Update List">
    </form>
    <a href="index.php">Back to List</a>
</body>
</html>
