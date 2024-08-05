<?php

class BackupModel {
    public function backup($siteDirectory, $dbUser, $dbPassword, $dbName) {
        $backupDir = $siteDirectory . '/backups/' . date('Y-m-d');
        $filesBackupName = $backupDir . '/site-backup.tar.gz';
        $dbBackupName = $backupDir . '/db-backup.sql';

        if (!file_exists($backupDir)) {
            mkdir($backupDir, 0777, true);
        }

        $command1 = "tar -czvf $filesBackupName -C $siteDirectory . 2>&1";
        $command2 = "mysqldump -u $dbUser -p$dbPassword $dbName > $dbBackupName 2>&1";

        exec($command1, $output1, $return_var1);
        exec($command2, $output2, $return_var2);

        // Логирование
        file_put_contents('/path/to/logs/backup_log.txt', "Command 1 output:\n" . implode("\n", $output1) . "\nReturn code: $return_var1\n", FILE_APPEND);
        file_put_contents('/path/to/logs/backup_log.txt', "Command 2 output:\n" . implode("\n", $output2) . "\nReturn code: $return_var2\n", FILE_APPEND);

        if ($return_var1 !== 0 || $return_var2 !== 0) {
            return false;
        }

        return true;
    }
}
?>
