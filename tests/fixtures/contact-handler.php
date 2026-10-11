<?php
// Local test fixture: no SMTP connection or message delivery.
if ($_POST['message'] === 'simulate-success') header('Location: ' . $_POST['page'] . '?mailsend#contact');
elseif ($_POST['message'] === 'simulate-throw') throw new RuntimeException('Simulated private mail error');
else echo 'Simulated private mail error';
