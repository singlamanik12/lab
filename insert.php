<?php

  /* VALIDATION */
  // Step 1: Create an array to hold all the field errors (replace null with the correct logic)
  $errors = null;

  // Step 2: Validate the necessary fields are not empty (add the required fields to the array)
  $required_fields = [];
  
  foreach ($required_fields as $field) {
    if (null) { // Step 3: Write the correct condition to check if the field is empty (replace null with the correct logic)
      $human_field = str_replace("_", " ", $field);
      $errors[] = "You cannot leave the {$human_field} blank.";
    }
  }

  // Step 4: Validate the username is in the correct format (replace null with the correct logic)
  if (null) {
    $errors[] = "The username isn't in a valid format. Please correct it.";
  }

  // Step 5: Validate the username matches the username_confirmation (replace null with the correct logic)
  if (null) {
    $errors[] = "The username doesn't match the username confirmation field";
  }

  // Step 6: Validate the password matches the password_confirmation (replace null with the correct logic)
  if (null) {
    $errors[] = "The password doesn't match the password confirmation field";
  }
  
  // Step 7: Check if they're errors (replace null with the correct logic)
  if (null) {
    // Add the current form values to the $_SESSION
    session_start();
    $_SESSION['form_values'] = $_POST;
    
    // Store the errors
    $_SESSION['errors'] = $errors;
    
    // Redirect back to the form and exit
    header('Location: ./register.php');
    exit;
  }
  /* END OF VALIDATION */

  /* NORMALIZATION */
  // Normalize the string fields (convert to lowercase and capitalize the first letter)
  foreach (['first_name', 'last_name'] as $field) {
    $_POST[$field] = strtolower($_POST[$field]);
    $_POST[$field] = ucwords($_POST[$field]);
  }

  // Step 8: Lowercase the username (replace null with the correct logic)
  $_POST['username'] = null;

  // Step 9: Hash the password (replace null with the correct logic)
  $_POST['password'] = null;
  /* END NORMALIZATION */

  /* SANITIZATION */
  // Sanitize all values on their insertion
  require_once('_connect.php');
  $conn = connect();

  // Step 10: Write the correct SQL statement that will insert the new user (you must bind the parameters (placeholders)) (replace null with the correct logic)
  $sql = null;
  $stmt = $conn->prepare($sql);

  // Step 11: Sanitize by binding the values to the parameters (placeholders) (replace null with the correct logic)
  $stmt->null;
  $stmt->null;
  /* END SANITIZATION */

  // Insert our row
  $stmt->execute();

  // Check for errors
  session_start();
  if ($stmt->errorCode() === "23000") {
    $_SESSION['errors'][] = "You have already registered. Please login.";
    $_SESSION['form_values'] = $_POST;
  } else if ($stmt->errorCode() !== "00000") {
    // Add the error message to the errors session array
    $_SESSION['errors'][] = "There was an error during registration.";
    $_SESSION['form_values'] = $_POST;
  } else {
    // Add the success message to the successes session array
    $_SESSION['successes'][] = "You have been registered successfully.";
    header('Location: ./login.php');
    exit;
  }

  // Redirect back to the form
  header('Location: ./register.php');
  exit;