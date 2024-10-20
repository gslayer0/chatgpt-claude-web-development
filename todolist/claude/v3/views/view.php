<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>View List</h1>
        <p><strong>Name:</strong> <span class="<?= $list['is_done'] ? 'completed' : '' ?>"><?= htmlspecialchars($list['name']) ?></span></p>
        <p><strong>Deadline:</strong> <?= $list['deadline'] ? htmlspecialchars($list['deadline']) : 'No deadline' ?></p>
        <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($list['description'])) ?></p>
        <p><strong>Status:</strong> <?= getCompletionStatus($list) ?></p>

        <div class="action-buttons">
            <a href="index.php?action=edit&id=<?= $list['id'] ?>" class="btn">Edit</a>
            <a href="index.php?action=delete&id=<?= $list['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            <a href="index.php?action=toggle&id=<?= $list['id'] ?>" class="btn"><?= $list['is_done'] ? 'Mark as Not Done' : 'Mark as Done' ?></a>
            <a href="index.php" class="btn">Back to List</a>
        </div>
    </div>
</body>
</html>