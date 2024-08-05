<?php
namespace Services;

use Utils\ExecCommand;

class BackupService {
    public static function backupSite($siteDirectory, $dbUser, $dbPassword, $dbName) {
        $backupDir = $siteDirectory . '/backups/' . date('Y-m-d');
        $filesBackupName = $backupDir . '/site-backup.tar.gz';
        $dbBackupName = $backupDir . '/db-backup.sql';

        if (!is_dir($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        ExecCommand::run("tar -czvf $filesBackupName -C $siteDirectory .");
        ExecCommand::run("mysqldump -u $dbUser -p$dbPassword $dbName > $dbBackupName");

        return ['filesBackupName' => $filesBackupName, 'dbBackupName' => $dbBackupName];
    }
}
?>