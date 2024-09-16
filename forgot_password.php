<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VT SAIL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'poppins', sans-serif;
        }


        section {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
            background: url('plant.jpg')no-repeat;
            background-position: center;
            background-size: cover;
        }

        .form-box {
            position: relative;
            width: 400px;
            height: 350px;
            background: transparent;
            border: 2px solid rgba(255, 255, 255, 0.5);
            border-radius: 20px;
            backdrop-filter: blur(15px);
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .form-box .login_instruct {
            text-align: center;
            margin: 10px;
            color: white;
            font-size: 13px;
        }

        h2 {
            font-size: 2em;
            color: #fff;
            text-align: center;
        }

        .inputbox {
            position: relative;
            margin: 30px 0;
            width: 310px;
            border-bottom: 2px solid #fff;
        }

        .inputbox label {
            position: absolute;
            top: 50%;
            left: 5px;
            transform: translateY(-50%);
            color: #fff;
            font-size: 1em;
            pointer-events: none;
        }

        .inputbox input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: none;
            outline: none;
            font-size: 1em;
            padding: 0 35px 0 5px;
            color: #fff;
        }

        .inputbox ion-icon {
            position: absolute;
            right: 8px;
            color: #fff;
            font-size: 1.2em;
            top: 20px;
        }

        .alert {
            position: absolute;
            top: -90px;
            left: 20px;
            right: 20px;
        }

        .register {
            font-size: .9em;
            color: #fff;
            text-align: center;
        }

        .register p {
            margin: 20px;
        }

        .register p a {
            margin-top: 20px;
            margin-left: 8px;
            color: #fff;
            font-weight: 500;
            font-style: italic;
        }
    </style>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <?php
                // forgot_password.php
                $hostName = "localhost";
                $dbUser = "root";
                $dbPassword = "";
                $dbName = "login_register";
                $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
                if (!$conn) {
                    die("Something went wrong;");
                }

                function generateResetToken($length = 20)
                {
                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                    $token = '';

                    for ($i = 0; $i < $length; $i++) {
                        $token .= $characters[rand(0, strlen($characters) - 1)];
                    }

                    return $token;
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_POST["email"];

                    // Check if the email exists in the database
                    $checkEmailSql = "SELECT * FROM users WHERE email = '$email'";
                    $checkEmailResult = mysqli_query($conn, $checkEmailSql);

                    if (mysqli_num_rows($checkEmailResult) > 0) {
                        // Email exists, proceed with the password reset
                
                        // Generate a reset token
                        $resetToken = generateResetToken();

                        // Assuming you have a database connection established ($conn)
                        $updateSql = "UPDATE users SET reset_token = '$resetToken' WHERE email = '$email'";

                        // Execute the query
                        $result = mysqli_query($conn, $updateSql);

                        // Check for errors
                        if (!$result) {
                            // If there's an error, print the error message
                            echo "Error updating reset token: " . mysqli_error($conn);
                        } else {
                            // If the query was successful, you can provide a success message or perform additional actions
                            // Send a password reset email
                            $to = $email;
                            $subject = "Password Reset";
                            $message = "Click the following link to reset your password: localhost/login-portal/reset_password.php?token=$resetToken";
                            $headers = "From: alexdacid22@gmail.com"; // Set your email address here
                            mail($to, $subject, $message, $headers);

                            // Redirect the user to a page indicating that a reset email has been sent
                            header("Location: reset_email_sent.php");
                            exit();
                        }
                    } else {
                        // Email does not exist, show an alert
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        This email is not registered with us.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                    }
                }
                ?>
                <form action="forgot_password.php" method="post">
                    <h2>Reset your password</h2>
                    <p class="login_instruct">Enter your registered email address.</p>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" placeholder="Email" id="email" name="email" required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-light text-dark btn-block" value="Get reset link" name="submit">
                    </div>
                    <div class="register">
                        <p>Remember your password? <a href="./login.php">Log In</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>