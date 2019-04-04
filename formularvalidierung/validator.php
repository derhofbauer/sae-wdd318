<?php 

$errors = [];

/**
 * Phone validation
 */
$phone = $_POST['phone'];
$exp = "/^(\+|00){1}[ ]?(41|43|49){1}([0-9 ]{4,})([\-\/]?[0-9]{1,4})?/";

if (!preg_match($exp, $phone)) {
    $errors['phone'] = "Bitte geben Sie eine vernünftige Telefonnummer ein.";
}

// strlen
// strpos
// isset
// empty


/**
 * + (optional) | 00
 * 43|49|41
 * min. 4
 * Leerzeichen, -, /
 * !133/122/144/112/110/911
 *
 * (\+|00){1}[ ]?(41|43|49){1}([0-9 ]{4,})([\-\/]?[0-9]{1,4})?
 */

?>