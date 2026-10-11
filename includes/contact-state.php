<?php
require_once __DIR__ . '/gallery-descriptions.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$contactState = $_SESSION['luxury_contact'] ?? ['values' => [], 'errors' => []];
unset($_SESSION['luxury_contact']);
function contactEscape($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
