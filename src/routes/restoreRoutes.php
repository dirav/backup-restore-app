<?php
use Controllers\RestoreController;

$router->post('/restore', function() {
    RestoreController::restore();
});
?>