<?php
// Creates input fields, with given name, label and place holder
function input_field($errors, $name, $label, $holder) {
  echo '<div class="required_field">';
  echo "<label for=\"$name\" ><b>$label</b></label>";
  // checks if a values are submitted before creating imput fields
  $value = posted_value($name);
  if ($name == "pass") {
      echo "<input type=\"password\" id=\"$name\" placeholder=\"$holder\" name=\"$name\" value=\"$value\"/>";
  } else {
      echo "<input type=\"text\" id=\"$name\" placeholder=\"$holder\" name=\"$name\" value=\"$value\"/>";
  }
  errorLabel($errors, $name); // prints error labels
  echo '</div></br>';
}

// fixes the value given from any special characters
function posted_value($name) {
  if(isset($_POST[$name])) {
    return htmlspecialchars($_POST[$name]);
  }
}

// creates the error label if errors exist
function errorLabel($errors, $name) {
    if (isset($errors[$name])) {
        foreach ($errors as $field => $error) {
            if ($field == $name) {
              echo "<font color='red'>". $error ."</font>"; // print errors in red
            }
        }
    }
}

?>
