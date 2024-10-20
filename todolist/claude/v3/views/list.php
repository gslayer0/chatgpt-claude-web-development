<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Todo List</h1>
        <a href="index.php?action=add" class="btn">Add New List</a>
        <table>
            <tr>
                <th>Name</th>
                <th>Deadline</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($lists as $list): ?>
            <tr>
                <td class="<?= $list['is_done'] ? 'completed' : '' ?>"><?= htmlspecialchars($list['name']) ?></td>
                <td><?= $list['deadline'] ? htmlspecialchars($list['deadline']) : 'No deadline' ?></td>
                <td><?= getCompletionStatus($list) ?></td>
                <td>
                    <div class="action-buttons">
                        <a href="index.php?action=view&id=<?= $list['id'] ?>" class="btn">View</a>
                        <a href="index.php?action=edit&id=<?= $list['id'] ?>" class="btn">Edit</a>
                        <a href="index.php?action=delete&id=<?= $list['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        <a href="index.php?action=toggle&id=<?= $list['id'] ?>" class="btn"><?= $list['is_done'] ? 'Mark as Not Done' : 'Mark as Done' ?></a>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>