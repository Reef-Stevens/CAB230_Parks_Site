<?php
function validateEmail(&$errors, $field_list, $field_name) {
  $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/';
  if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'required';
  } else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'invalid';
  }
}

?>
