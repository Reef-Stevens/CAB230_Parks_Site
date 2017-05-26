<?php

function input_field($errors, $name, $label, $holder) {
  echo '<div class="required_field">';
  label($name, $label);
  $value = posted_value($name);
  if ($name == "pass") {
      echo "<input type=\"password\" id=\"$name\" placeholder=\"$holder\" name=\"$name\" value=\"$value\"/>";
  } else {
      echo "<input type=\"text\" id=\"$name\" placeholder=\"$holder\" name=\"$name\" value=\"$value\"/>";
  }
  errorLabel($errors, $name);
  echo '</div>';
  echo '</br>';
}

function label($name, $label) {
  echo "<label for=\"$name\" ><b>$label</b></label>";
}

function posted_value($name) {
  if(isset($_POST[$name])) {
    return htmlspecialchars($_POST[$name]);
  }
}

function errorLabel($errors, $name) {
  if (isset($errors[$name])) {
      foreach ($errors as $field => $error) {
          if ($field == $name) {
              echo "<font color='red'>". $error ."</font>";
          }
      }
  }
}


?>
