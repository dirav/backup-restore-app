<?php
require_once 'models/BackupModel.php';

class BackupController {
    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $siteDirectory = $_POST['siteDirectory'];
            $dbUser = $_POST['dbUser'];
            $dbPassword = $_POST['dbPassword'];
            $dbName = $_POST['dbName'];

            $backupModel = new BackupModel();
            $result = $backupModel->backup($siteDirectory, $dbUser, $dbPassword, $dbName);

            include 'views/backup.php';
        } else {
            include 'views/backup.php';
        }
    }
}
?>