<?php
namespace Utils;

class ExecCommand {
    public static function run($command) {
        $output = [];
        $return_var = 0;
        exec($command, $output, $return_var);
        if ($return_var !== 0) {
            throw new \Exception("Command failed: " . implode("\n", $output));
        }
        return implode("\n", $output);
    }
}
?>