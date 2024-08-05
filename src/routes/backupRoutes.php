<?php
use Controllers\BackupController;

$router->post('/backup', function() {
    BackupController::backup();
});
?>