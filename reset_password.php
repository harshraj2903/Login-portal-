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

                <form action="update_password.php" method="post">
                    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
                        We have sent you an email with instructions to reset your password. Please check your email
                        inbox.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div> -->
                    <h2>Reset your password</h2>
                    <!-- <p class="login_instruct">Enter your registered email address.</p> -->
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <!-- <input type="email" placeholder="Email" id="email" name="email" required> -->
                        <?php
                        $token = $_GET['token'];
                        echo "<input type='hidden' name='token' value='$token'>";
                        ?>
                        <input type='password' id='new_password' name='new_password'
                            placeholder="Enter your new password" required>
                        <!-- <label for='new_password'></label> -->
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-light text-dark btn-block" value="Update Password"
                            name="submit">
                    </div>
                    <!-- <div class="register">
                        <p>Remember your password? <a href="./login.php">Log In</a></p>
                    </div> -->
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