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
    $sql = "UPDATE lists SET is_done = NOT is_done WHERE id = ?";
    $db->query($sql, [$id]);
}
?>
