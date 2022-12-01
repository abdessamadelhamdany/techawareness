<?php

$files = glob(__DIR__ . '/**/*.func.php');

if ($files === false) {
    throw new RuntimeException("Failed to glob for function files");
}

foreach ($files as $file) {
    require_once $file;
}

unset($file);
unset($files);