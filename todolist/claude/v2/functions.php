<?php
function addList($db, $name, $deadline, $description) {
    $sql = "INSERT INTO lists (name, deadline, description) VALUES (?, ?, ?)";
    $db->query($sql, [$name, $deadline, $description]);
}

function updateList($db, $id, $name, $deadline, $description) {
    $sql = "UPDATE lists SET name = ?, deadline = ?, description = ? WHERE id = ?";
    $db->query($sql, [$name, $deadline, $description, $id]);
}

function deleteList($db, $id) {
    $sql = "DELETE FROM lists WHERE id = ?";
    $db->query($sql, [$id]);
}

function getAllLists($db) {
    $sql = "SELECT * FROM lists ORDER BY deadline ASC";
    return $db->query($sql)->fetchAll();
}

function getList($db, $id) {
    $sql = "SELECT * FROM lists WHERE id = ?";
    return $db->query($sql, [$id])->fetch();
}

function toggleList($db, $id) {
    $list = getList($db, $id);
    if ($list['is_done']) {
        // If the task is already done, mark it as undone and clear the completed_at date
        $sql = "UPDATE lists SET is_done = 0, completed_at = NULL WHERE id = ?";
    } else {
        // If the task is not done, mark it as done and set the completed_at date
        $sql = "UPDATE lists SET is_done = 1, completed_at = NOW() WHERE id = ?";
    }
    $db->query($sql, [$id]);
}

function getCompletionStatus($list) {
    if ($list['is_done']) {
        if ($list['completed_at'] !== null) {
            return 'Completed on ' . date('Y-m-d H:i:s', strtotime($list['completed_at']));
        } else {
            return 'Completed (date unknown)';
        }
    } else {
        return 'Not completed';
    }
}
?>