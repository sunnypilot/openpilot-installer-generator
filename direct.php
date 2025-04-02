<?php
// Simple direct endpoint for AGNOSSetup
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Log all request details
file_put_contents('direct_debug.log', date('Y-m-d H:i:s') . "\n" .
                 "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n" .
                 "USER_AGENT: " . $_SERVER['HTTP_USER_AGENT'] . "\n" .
                 "QUERY_STRING: " . $_SERVER['QUERY_STRING'] . "\n" .
                 "REQUEST_METHOD: " . $_SERVER['REQUEST_METHOD'] . "\n" .
                 "HTTP_HOST: " . $_SERVER['HTTP_HOST'] . "\n", FILE_APPEND);

// Try to load the installer binary
$binary_path = getcwd() . "/installer_openpilot_agnos";
if (!file_exists($binary_path)) {
    die("Binary file not found");
}

// Serve the unmodified binary
header("Content-Type: application/octet-stream");
header("Content-Length: " . filesize($binary_path));
header("Content-Disposition: attachment; filename=installer_openpilot");
readfile($binary_path);
exit;
?>
