<?php
namespace Services;

use Utils\ExecCommand;

class RestoreService {
    public static function restoreSite($siteDirectory, $dbUser, $dbPassword, $dbName, $backupDate) {
        $backupDir = $siteDirectory . '/backups/' . $backupDate;
        $filesBackupName = $backupDir . '/site-backup.tar.gz';
        $dbBackupName = $backupDir . '/db-backup.sql';

        if (!file_exists($filesBackupName) || !file_exists($dbBackupName)) {
            throw new \Exception("Backup files not found.");
        }

        ExecCommand::run("tar -xzvf $filesBackupName -C /");
        ExecCommand::run("mysql -u $dbUser -p$dbPassword $dbName < $dbBackupName");

        return ['filesBackupName' => $filesBackupName, 'dbBackupName' => $dbBackupName];
    }
}
?>