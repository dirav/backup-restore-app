<?php
namespace Controllers;

use Services\BackupService;

class BackupController {
    public static function backup() {
        $data = json_decode(file_get_contents('php://input'), true);
        $siteDirectory = $data['siteDirectory'] ?? null;
        $dbUser = $data['dbUser'] ?? null;
        $dbPassword = $data['dbPassword'] ?? null;
        $dbName = $data['dbName'] ?? null;

        if (!$siteDirectory || !$dbUser || !$dbPassword || !$dbName) {
            http_response_code(400);
            echo json_encode(['message' => 'Missing required parameters']);
            return;
        }

        try {
            $result = BackupService::backupSite($siteDirectory, $dbUser, $dbPassword, $dbName);
            echo json_encode(['message' => 'Backup completed successfully', 'result' => $result]);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['message' => 'Backup failed', 'error' => $e->getMessage()]);
        }
    }
}
?>