<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View List</title>
</head>
<body>
    <h1>View List</h1>
    <p><strong>Name:</strong> <?= htmlspecialchars($list['name']) ?></p>
    <p><strong>Deadline:</strong> <?= $list['deadline'] ? htmlspecialchars($list['deadline']) : 'No deadline' ?></p>
    <p><strong>Description:</strong> <?= nl2br(htmlspecialchars($list['description'])) ?></p>
    <p><strong>Status:</strong> <?= getCompletionStatus($list) ?></p>

    <a href="index.php?action=edit&id=<?= $list['id'] ?>">Edit</a>
    <a href="index.php?action=delete&id=<?= $list['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    <a href="index.php?action=toggle&id=<?= $list['id'] ?>"><?= $list['is_done'] ? 'Mark as Not Done' : 'Mark as Done' ?></a>
    <a href="index.php">Back to List</a>
</body>
</html>