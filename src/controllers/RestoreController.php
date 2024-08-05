<?php
namespace Controllers;

use Services\RestoreService;

class RestoreController {
    public static function restore() {
        $data = json_decode(file_get_contents('php://input'), true);
        $siteDirectory = $data['siteDirectory'] ?? null;
        $dbUser = $data['dbUser'] ?? null;
        $dbPassword = $data['dbPassword'] ?? null;
        $dbName = $data['dbName'] ?? null;
        $backupDate = $data['backupDate'] ?? null;

        if (!$siteDirectory || !$dbUser || !$dbPassword || !$dbName || !$backupDate) {
            http_response_code(400);
            echo json_encode(['message' => 'Missing required parameters']);
            return;
        }

        try {
            $result = RestoreService::restoreSite($siteDirectory, $dbUser, $dbPassword, $dbName, $backupDate);
            echo json_encode(['message' => 'Restore completed successfully', 'result' => $result]);
        } catch (\Exception $e) {
            http_response_code(500);
            echo json_encode(['message' => 'Restore failed', 'error' => $e->getMessage()]);
        }
    }
}
?>