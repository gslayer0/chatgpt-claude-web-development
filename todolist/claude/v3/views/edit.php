<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Edit List</h1>
        <form action="index.php?action=edit&id=<?= $list['id'] ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($list['name']) ?>" required>

            <label for="deadline">Deadline:</label>
            <input type="date" id="deadline" name="deadline" value="<?= $list['deadline'] ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description"><?= htmlspecialchars($list['description']) ?></textarea>

            <div class="form-buttons">
                <input type="submit" value="Update List" class="btn">
                <a href="index.php" class="btn">Back to List</a>
            </div>
        </form>
    </div>
</body>
</html>