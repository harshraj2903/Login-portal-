
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
                if (isset($_POST["login"])) {
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    require_once "database.php";
                    $sql = "SELECT * FROM users WHERE email = '$email'";
                    $result = mysqli_query($conn, $sql);
                    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if ($user) {
                        if (password_verify($password, $user["password"])) {
                            // session_start();
                            $_SESSION["user"] = "yes";
                            header("Location: registration.php");
                            die();
                        } else {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Email/Password does not match.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";

                        }
                    } else {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>Email/Password does not match.<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
                    }
                }
                ?>
                <form action="login.php" method="post">
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
                        <p>Don't have a account? <a href="./registration2.php">Sign up</a></p>
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