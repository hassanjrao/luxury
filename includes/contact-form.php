<?php
$contactPage = basename($_SERVER['SCRIPT_NAME']);
$contactErrors = $contactState['errors'] ?? [];
$contactValues = $contactState['values'] ?? [];
?>
<?php if (isset($_GET['mailsend'])): ?>
<p class="contact-success" role="status" tabindex="-1" id="contact-status">Message sent successfully! We will get back to you shortly.</p>
<?php endif; ?>
<?php if ($contactErrors): ?>
<div class="contact-errors" role="alert" tabindex="-1" id="contact-errors">
  <h3>Please check your message</h3>
  <ul>
    <?php foreach ($contactErrors as $field => $error): ?>
    <li><?php if ($field !== 'delivery'): ?><a href="#<?= contactEscape($field) ?>"><?= contactEscape($error) ?></a><?php else: ?><?= contactEscape($error) ?><?php endif; ?></li>
    <?php endforeach; ?>
  </ul>
</div>
<?php endif; ?>
<p class="text-center text-gray-600 mb-8">Send us a message and someone from our team will get back to you shortly. All fields are required.</p>
<form id="contact-form" action="./contact.php" method="POST">
  <input type="hidden" name="page" value="<?= contactEscape($contactPage) ?>">
  <?php foreach (['name' => ['Name', 'text', 'name'], 'phone' => ['Phone number', 'tel', 'tel'], 'email' => ['Email address', 'email', 'email'], 'message' => ['Message', null, null]] as $field => $details): ?>
  <div class="mb-4">
    <label for="<?= $field ?>" class="block font-semibold mb-2"><?= $details[0] ?> (required)</label>
    <?php if ($field === 'message'): ?>
    <textarea name="message" id="message" rows="5" maxlength="10000" class="contact-input" required<?= isset($contactErrors[$field]) ? ' aria-invalid="true" aria-describedby="message-error"' : '' ?>><?= contactEscape($contactValues[$field] ?? '') ?></textarea>
    <?php else: ?>
    <input type="<?= $details[1] ?>" name="<?= $field ?>" id="<?= $field ?>" autocomplete="<?= $details[2] ?>" maxlength="<?= $field === 'email' ? 254 : 200 ?>" class="contact-input" value="<?= contactEscape($contactValues[$field] ?? '') ?>" required<?= isset($contactErrors[$field]) ? ' aria-invalid="true" aria-describedby="' . $field . '-error"' : '' ?>>
    <?php endif; ?>
    <?php if (isset($contactErrors[$field])): ?><p class="field-error" id="<?= $field ?>-error"><?= contactEscape($contactErrors[$field]) ?></p><?php endif; ?>
  </div>
  <?php endforeach; ?>
  <button type="submit" name="submit" class="bg-blue-900 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-950">Send message</button>
</form>
