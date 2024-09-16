<?php
// update_password.php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "login_register";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Update the password in the database
    $updateSql = "UPDATE users SET password = '$newPassword', reset_token = NULL WHERE reset_token = '$token'";
    // Execute the query...
    $result = mysqli_query($conn, $updateSql);

    // Check for errors
    if (!$result) {
        echo "Error updating password: " . mysqli_error($conn);
    } else {
        echo "Password updated successfully";
    }

    // Redirect the user to a page indicating that the password has been updated
    header("Location: password_updated.php");
    exit();
}
?>