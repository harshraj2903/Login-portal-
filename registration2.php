<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>VT SAIL</title>
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
            height: 450px;
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

        .rf {
            margin: 10px;
            color: white;
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
            transition: .4s;
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

        .forget {
            font-size: .9em;
            color: #fff;
            display: flex;
            justify-content: space-between;
        }

        .forget a {
            margin-left: 5px;
            margin-bottom: 15px;
            color: #fff;
            font-style: italic;
        }

        .forget label a:hover {
            text-decoration: underline;
        }

        /* button{
    margin-top: 5px;
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #fff;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
} */
        .alert {
            position: absolute;
            top: -70px;
            left: 20px;
            right: 20px;
        }

        .register {
            font-size: .9em;
            color: #fff;
            text-align: center;
            margin: 25px 0 10px;
        }

        .register p a {
            margin-left: 8px;
            color: #fff;
            font-weight: 500;
            font-style: italic;
        }

        .register p a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <?php
                function generateOtp()
                {
                    return rand(100000, 999999); // Generates a 6-digit OTP
                }
                if (isset($_POST["submit"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $passwordRepeat = $_POST["repeat_password"];

                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                    $errors = array();

                    if (empty($email) or empty($password) or empty($passwordRepeat)) {
                        array_push($errors, "All fields are required");
                    }
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        array_push($errors, "Email is not valid");
                    }
                    if (strlen($password) < 8) {
                        array_push($errors, "Password must be at least 8 charactes long");
                    }
                    if ($password !== $passwordRepeat) {
                        array_push($errors, "Password does not match");
                    }
                    require_once "database.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $rowCount = mysqli_num_rows($result);
                    if ($rowCount > 0) {
                        array_push($errors, "This email is already registered!");
                    }
                    if (count($errors) > 0) {
                        foreach ($errors as $error) {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>$error<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                        }
                    } else {
                        $sql = "INSERT INTO users (email, password) VALUES ( ?, ? )";
                        $stmt = mysqli_stmt_init($conn);
                        $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                        if ($prepareStmt) {
                            mysqli_stmt_bind_param($stmt, "ss", $email, $passwordHash);
                            mysqli_stmt_execute($stmt);
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            You are registered successfully!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                          </div>";

                            // Add email verification
                            $otp = generateOtp();
                            $otpExpiresAt = date('Y-m-d H:i:s', strtotime('+10 minutes'));

                            // Update your database to store the OTP, expiration time, and set 'verified' to 0
                            $query = "INSERT INTO users (email, password, otp, otp_expires_at, verified) VALUES ('$email', '$passwordHash', '$otp', '$otpExpiresAt', 0)";
                            if (mysqli_query($conn, $query)) {
                                // Success
                            } else {
                                echo "Error: " . $query . "<br>" . mysqli_error($conn);
                            }

                            // Send verification email with OTP
                            $to = $email;
                            $subject = "OTP for Email Verification";
                            $message = "Your OTP which will expire after 10 min for email verification is: $otp";
                            $headers = "From: alexdacid22@gmail.com"; // Set your email address here
                
                            mail($to, $subject, $message, $headers);
                            header("Location: verification_sent.php?email=$email");
                            exit();
                        } else {
                            die("Something went wrong");
                        }
                    }
                }
                ?>
                <form action="registration.php" method="post">
                    <h2 class="rf">Sign Up</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" placeholder="Email as Username" name="email">
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" placeholder="Password" name="password">
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" placeholder="Confirm Password" name="repeat_password">
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-light text-dark" value="Sign Up" name="submit">
                    </div>
                    <div class="register">
                        <p>Already have an account? <a href="./login.php">Log In</a></p>
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