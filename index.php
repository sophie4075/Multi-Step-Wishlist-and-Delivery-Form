<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

/**
  * Validates wish list form entries.
  * Checks whether there is at least one input and that no input contains special characters or is less than or greater than an invalid length.
  */
function validateWishes($post)
{
    //Array for potential error messages
    $errors = [];
    // Counter for valid inputs
    $validInputCount = 0;

    foreach (['wish1', 'wish2', 'wish3'] as $field) {
        if (!empty($post[$field])) {
            if (!preg_match('/^[a-zA-Z0-9äöüÄÖÜß ]{4,20}$/', $post[$field])) {
                $errors[$field] = "Der Wunsch darf weder Sonderzeichen enthalten, nicht kürzer als 4 und nicht länger als 20 Zeichen sein.";
            } else {
                $validInputCount++;
            }
        }
    }

    if ($validInputCount == 0) {
        $errors['general'] = "At least one field must be filled out.";
    }

    return $errors;
}


// Function for validating delivery address form entries
function validateDelivery($post)
{
    $errors = [];

   
    if (empty($post['name']) || !preg_match('/^[a-zA-ZäöüÄÖÜß ]{4,20}$/', $post['name'])) {
        $errors['name'] = 'Please enter a valid name';
    }
    if (empty($post['address']) || !preg_match('/^[a-zA-Z0-9äöüÄÖÜß ]{4,30}$/', $post['address'])) {
        $errors['address'] = 'Please enter a valid address.';
    }
    if (empty($post['zip']) || !preg_match('/^[0-9]{5}$/', $post['zip'])) {
        $errors['zip'] = 'ZIP must contain 5 numbers.';
    }
    if (empty($post['city']) || !preg_match('/^[a-zA-ZäöüÄÖÜß ]{4,32}$/', $post['name'])) {
        $errors['city'] = 'Please enter a city.';
    }


    return $errors;
}

$errors = [];
// Default Form
$stage = 1;  

// Checks whether the wish list form has been sent
if (isset($_POST['submitWishes'])) {

/*
    * Calls the validateWishes function to validate the form data sent via the POST request.
    * The error messages returned are stored in $errors and used to provide feedback to the user,
    * which entries may need to be corrected.
    * If no errors are found, the system moves on to the next form.
 */
    $errors = validateWishes($_POST);

    if (empty($errors)) {
        // Saves the validated data within the session it can be used later.
        $_SESSION['wishes'] = $_POST;
        // Sets stage 2 to ‘go’ to the next form
        $stage = 2;
    } else {
        $stage = 1;
    }
}

//Same principle as with the wish list form :)if (isset($_POST['submitDelivery'])) {
    $errors = validateDelivery($_POST);
    if (empty($errors)) {
        $_SESSION['delivery'] = $_POST;
        $stage = 3;
    } else {
        $stage = 2;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Wishlist</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Archivo+Black|Open+Sans:300,700" rel="stylesheet">
</head>
<body>

<?php
switch ($stage) {
    case 1:
        //Integrates the specified file and evaluates it.
        include 'wishes_form.php';
        break;
    case 2:
        include 'delivery_form.php';
        break;
    case 3:
        include 'confirmation.php';
        break;
    default:
        echo "An unknown error has occurred. :(";
        break;
}
?>


</body>
</html>

