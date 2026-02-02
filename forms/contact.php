<?php
// Receiver email
$receiving_email_address = 'sanikapatil1417@gmail.com';

// Include the PHP Email Form library
if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
  include($php_email_form);
} else {
  die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

// Email settings
$contact->to = $receiving_email_address;
$contact->from_name = isset($_POST['name']) ? $_POST['name'] : '';
$contact->from_email = isset($_POST['email']) ? $_POST['email'] : '';
$contact->subject = isset($_POST['subject']) ? $_POST['subject'] : 'New Message from Website';

// ✅ Gmail SMTP settings
$contact->smtp = array(
  'host' => 'smtp.gmail.com',
  'username' => 'sanikapatil1417@gmail.com',
  'password' => 'qfsy bsup qeic huwe', // 🔑 Gmail App Password
  'port' => '587',
  'encryption' => 'tls'
);

// Add form fields
if (!empty($_POST['name'])) {
  $contact->add_message($_POST['name'], 'From');
}
if (!empty($_POST['email'])) {
  $contact->add_message($_POST['email'], 'Email');
}
if (!empty($_POST['message'])) {
  $contact->add_message($_POST['message'], 'Message', 10);
}

// Send email
echo $contact->send();
?>
