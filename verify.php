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
            top: -90px;
            left: 20px;
            right: 20px;
        }

        .register {
            font-size: .9em;
            color: #fff;
            text-align: center;
        }

        .register p a {
            margin-left: 8px;
            color: #fff;
            font-weight: 500;
            font-style: italic;
        }

        /* .register p a:hover {
            text-decoration: underline;
        } */
    </style>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <?php
                $hostName = "localhost";
                $dbUser = "root";
                $dbPassword = "";
                $dbName = "login_register";
                $conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                    $email = $_POST['email'];
                    $enteredOtp = $_POST['otp'];

                    // Query to find the user with the provided email and OTP
                    $sql = "SELECT * FROM users WHERE email = '$email' AND otp = '$enteredOtp' AND verified = 0";
                    $result = mysqli_query($conn, $sql);

                    // Check if a user with the provided email and OTP exists
                    if (mysqli_num_rows($result) > 0) {
                        // Update the 'verified' column to 1
                        $updateSql = "UPDATE users SET verified = 1 WHERE email = '$email'";
                        if (mysqli_query($conn, $updateSql)) {
                            // echo "Done";
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            Email verification successful. You can now login into your account.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                        } else {
                            echo "Error updating record: " . mysqli_error($conn);
                        }
                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Invalid OTP or the account is already verified.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
                }

                // Close the database connection
                mysqli_close($conn);
                ?>

                <form action="./login.php" method="post">
                    <h2>Login</h2>
                    <p class="login_instruct">Login with your registered email and password.</p>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" placeholder="Email" name="email" required>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-light text-dark btn-block" value="Login" name="login">
                    </div>
                    <div class="register">
                        <p>Forgot your password?<a href="./forgot_password.php">Reset Password</a></p>
                        <p>Don't have a account? <a href="./registration.php">Sign up</a></p>
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