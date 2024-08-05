<?php
require_once 'models/RestoreModel.php';

class RestoreController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $siteDirectory = $_POST['siteDirectory'];
            $dbUser = $_POST['dbUser'];
            $dbPassword = $_POST['dbPassword'];
            $dbName = $_POST['dbName'];
            $backupDate = $_POST['backupDate'];

            $restoreModel = new RestoreModel();
            $result = $restoreModel->restore($siteDirectory, $dbUser, $dbPassword, $dbName, $backupDate);

            include 'views/restore.php';
        } else {
            include 'views/restore.php';
        }
    }
}
?>