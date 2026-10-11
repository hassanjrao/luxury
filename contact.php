<?php
session_start();
$pages = array_map('basename', glob(__DIR__ . '/*.php'));
$pages = array_diff($pages, ['contact.php']);
$page = isset($_POST['page']) && is_string($_POST['page']) && in_array($_POST['page'], $pages, true) ? $_POST['page'] : 'index.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php#contact', true, 303);
    exit;
}
$values = [];
$errors = [];
foreach (['name' => 'your name', 'phone' => 'your phone number', 'email' => 'your email address', 'message' => 'a message'] as $field => $label) {
    $values[$field] = isset($_POST[$field]) && is_string($_POST[$field]) ? trim($_POST[$field]) : '';
    if ($values[$field] === '') {
        $errors[$field] = 'Enter ' . $label . '.';
    } elseif (strlen($values[$field]) > ($field === 'message' ? 10000 : ($field === 'email' ? 254 : 200))) {
        $errors[$field] = 'Shorten ' . $label . ' before sending.';
    }
}
if ($values['email'] !== '' && !filter_var($values['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Enter a valid email address, such as name@example.com.';
}
if (!$errors) {
    // Preserve the existing delivery integration outside the web root and Git.
    $handler = getenv('MODERN_LUXURY_CONTACT_HANDLER') ?: dirname(__DIR__) . '/.modernluxurybuilders-contact.php';
    if (is_file($handler)) {
        $_POST = array_merge($_POST, $values, ['page' => $page]);
        ob_start();
        try {
            chdir(__DIR__);
            require $handler;
            $deliveryOutput = ob_get_clean();
            $sent = false;
            foreach (headers_list() as $header) {
                if (stripos($header, 'Location:') === 0 && strpos($header, '?mailsend#contact') !== false) $sent = true;
            }
            if ($sent && trim($deliveryOutput) === '') {
                unset($_SESSION['luxury_contact']);
                header('Location: ' . $page . '?mailsend#contact', true, 303);
                exit;
            }
        } catch (Throwable $exception) {
            ob_end_clean();
        }
    }
    $errors['delivery'] = 'Your message could not be sent. Please try again later. Your entries have been kept below.';
}
$_SESSION['luxury_contact'] = ['values' => $values, 'errors' => $errors];
header('Location: ' . $page . '?contacterror#contact', true, 303);
exit;
