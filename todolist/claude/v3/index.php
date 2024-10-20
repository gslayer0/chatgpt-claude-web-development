<?php
session_start();
require_once 'database.php';
require_once 'functions.php';

$db = new Database();
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

switch ($action) {
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : null;
            $description = $_POST['description'];
            addList($db, $name, $deadline, $description);
            header('Location: index.php');
            exit;
        }
        include 'views/add.php';
        break;

    case 'edit':
        $id = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $deadline = !empty($_POST['deadline']) ? $_POST['deadline'] : null;
            $description = $_POST['description'];
            updateList($db, $id, $name, $deadline, $description);
            header('Location: index.php');
            exit;
        }
        $list = getList($db, $id);
        include 'views/edit.php';
        break;

    case 'delete':
        $id = $_GET['id'];
        deleteList($db, $id);
        header('Location: index.php');
        exit;

    case 'view':
        $id = $_GET['id'];
        $list = getList($db, $id);
        include 'views/view.php';
        break;

    case 'toggle':
        $id = $_GET['id'];
        toggleList($db, $id);
        header('Location: index.php');
        exit;

    default:
        $lists = getAllLists($db);
        include 'views/list.php';
        break;
}
?>
