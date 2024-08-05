<?php
require 'vendor/autoload.php';

use Klein\Klein;

$router = new Klein();

require __DIR__ . '/routes/backupRoutes.php';
require __DIR__ . '/routes/restoreRoutes.php';

$router->dispatch();
?>