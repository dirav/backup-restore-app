<?php
require_once 'controllers/BackupController.php';
require_once 'controllers/RestoreController.php';

$action = $_GET['action'] ?? 'backup';

switch ($action) {
    case 'backup':
        $controller = new BackupController();
        $controller->handleRequest();
        break;
    case 'restore':
        $controller = new RestoreController();
        $controller->handleRequest();
        break;
    default:
        echo "Invalid action.";
        break;
}
?>