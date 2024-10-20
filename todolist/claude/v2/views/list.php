<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h1>Todo List</h1>
    <a href="index.php?action=add">Add New List</a>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($lists as $list): ?>
        <tr>
            <td><?= htmlspecialchars($list['name']) ?></td>
            <td><?= $list['deadline'] ? htmlspecialchars($list['deadline']) : 'No deadline' ?></td>
            <td><?= getCompletionStatus($list) ?></td>
            <td>
                <a href="index.php?action=view&id=<?= $list['id'] ?>">View</a>
                <a href="index.php?action=edit&id=<?= $list['id'] ?>">Edit</a>
                <a href="index.php?action=delete&id=<?= $list['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                <a href="index.php?action=toggle&id=<?= $list['id'] ?>"><?= $list['is_done'] ? 'Mark as Not Done' : 'Mark as Done' ?></a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>