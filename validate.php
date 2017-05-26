<?php
// function to validate the user email
function validateEmail(&$errors, $field_list, $field_name) {
  $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/'; // particular regex for email
  if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'Required';
  } else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Invalid. Must be in format xx@xx.xx';
  }
}

// function to validate the user name
function validateName(&$errors, $field_list, $field_name) {
  $pattern = '/^[a-zA-Z]{2,20}$/'; // simple regex to check for name made of only letters
  if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'Required';
  } else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Invalid. Must be between 2 and 20 letters long.';
  }
}

// function to validate the user age
function validateAge(&$errors, $field_list, $field_name) {
  $pattern = '/^([1-9][8-9]|[2-9][0-9])$/'; // simple regex to check that age is possible and numerical
  if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'Required';
} else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Invalid. Must be between 18 and 99.';
  }
}

// function to validate the user password
function validatePass(&$errors, $field_list, $field_name) {
  $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/';
  // Minimum 8 characters at least 1 Uppercase Alphabet, 1 Lowercase Alphabet and 1 Number
  if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'Required';
  } else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Invalid. Must be at least 8 char, with at least 1 uppercase, 1 lowercase and 1 number.';
  }
}

// function to validate the user date of birth
function validateDate(&$errors, $field_list, $field_name) {
    // complex regex to check the date of birht (could be made much simpler)
  $pattern = '/(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2][0-9])\d\d$)|(^29[\/]02[\/](19|[2][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/';
  if (!isset($field_list[$field_name])|| empty($field_list[$field_name])) {
    $errors[$field_name] = 'Required';
  } else if (!preg_match($pattern, $field_list[$field_name])) {
    $errors[$field_name] = 'Invalid. Must in in format DD/MM/YYYY';
  }
}

?>
