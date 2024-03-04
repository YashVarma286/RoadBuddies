<?php
// Define the password criteria
$hasDigit = false;
$hasSpecialChar = false;
$hasUppercase = false;
$hasLowercase = false;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the entered password from the form
    $enteredPassword = $_POST["password"];

    // Check if the password meets the criteria
    if (preg_match("/[0-9]/", $enteredPassword)) {
        $hasDigit = true;
    }
    if (preg_match("/[^A-Za-z0-9]/", $enteredPassword)) {
        $hasSpecialChar = true;
    }
    if (preg_match("/[A-Z]/", $enteredPassword)) {
        $hasUppercase = true;
    }
    if (preg_match("/[a-z]/", $enteredPassword)) {
        $hasLowercase = true;
    }

    // Verify if all criteria are met
    if ($hasDigit && $hasSpecialChar && $hasUppercase && $hasLowercase) {
        echo "Password meets the criteria!";
    } else {
        echo "Password does not meet the criteria. Please try again!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Criteria Verification</title>
</head>
<body>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="password">Enter Password:</label>
        <input type="password" name="password" id="password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>