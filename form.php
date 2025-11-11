
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/fontawesome-all.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #7d2ae8;
            padding: 30px;
        }

        .container {
            position: relative;
            max-width: 100%;
            width: 100%;
            background: #fff;
            padding: 40px 30px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            perspective: 2700px;
        }

        .container .cover {
            position: absolute;
            top: 0;
            left: 50%;
            height: 100%;
            width: 50%;
            z-index: 98;
            transition: all 1s ease;
            transform-origin: left;
            transform-style: preserve-3d;
            backface-visibility: hidden;
        }

        .container #flip:checked~.cover {
            transform: rotateY(-180deg);
        }

        .container #flip:checked~.forms .login-form {
            pointer-events: none;
        }

        .container .cover .front,
        .container .cover .back {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
        }

        .cover .back {
            transform: rotateY(180deg);
        }

        .container .cover img {
            position: absolute;
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: 10;
        }

        .container .cover .text {
            position: absolute;
            z-index: 10;
            height: 100%;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container .cover .text::before {
            content: '';
            position: absolute;
            height: 100%;
            width: 100%;
            opacity: 0.5;
            background: #7d2ae8;
        }

        .cover .text .text-1,
        .cover .text .text-2 {
            z-index: 20;
            font-size: 26px;
            font-weight: 600;
            color: #fff;
            text-align: center;
        }

        .cover .text .text-2 {
            font-size: 15px;
            font-weight: 500;
        }

        .container .forms {
            height: 100%;
            width: 100%;
            background: #fff;
        }

        .container .form-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .form-content .login-form,
        .form-content .signup-form {
            width: calc(100% / 2 - 25px);
        }

        .forms .form-content .title {
            position: relative;
            font-size: 24px;
            font-weight: 500;
            color: #333;
        }

        .forms .form-content .title:before {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            height: 3px;
            width: 25px;
            background: #7d2ae8;
        }

        .forms .signup-form .title:before {
            width: 20px;
        }

        .forms .form-content .input-boxes {
            margin-top: 30px;
        }

        .input-boxxes {
            width: 100%;
            height: auto;
            position: relative;
            display: flex;
        }

        .forms .form-content .input-box {
            display: flex;
            align-items: center;
            height: 50px;
            width: 100%;
            margin: 10px 0;
            position: relative;
        }

        .form-content .input-box input {
            height: 100%;
            width: 100%;
            outline: none;
            border: none;
            padding: 0 30px;
            font-size: 16px;
            font-weight: 500;
            border-bottom: 2px solid rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .form-content .input-box input:focus,
        .form-content .input-box input:valid {
            border-color: #7d2ae8;
        }

        .form-content .input-box i {
            position: absolute;
            color: #7d2ae8;
            font-size: 17px;
        }

        .forms .form-content .text {
            font-size: 14px;
            font-weight: 500;
            color: #333;
        }

        .forms .form-content .text a {
            text-decoration: none;
        }

        .forms .form-content .text a:hover {
            text-decoration: underline;
        }

        .forms .form-content .button {
            color: #fff;
            margin-top: 40px;
        }

        .forms .form-content .button input {
            color: #fff;
            background: #7d2ae8;
            border-radius: 6px;
            padding: 0;
            cursor: pointer;
            transition: all 0.4s ease;
        }

        .forms .form-content .button input:hover {
            background: #5b13b9;
        }

        .forms .form-content label {
            color: #5b13b9;
            cursor: pointer;
        }

        .forms .form-content label:hover {
            text-decoration: underline;
        }

        .forms .form-content .login-text,
        .forms .form-content .sign-up-text {
            text-align: center;
            margin-top: 25px;
        }

        .container #flip {
            display: none;
        }

        @media (max-width: 730px) {
            .container .cover {
                display: none;
            }

            .form-content .login-form,
            .form-content .signup-form {
                width: 100%;
            }

            .form-content .signup-form {
                display: none;
            }

            .container #flip:checked~.forms .signup-form {
                display: block;
            }

            .container #flip:checked~.forms .login-form {
                display: none;
            }
        }
        @media (max-width:1200px) {
          .forms .signup-form .input-boxxes{
                display: block !important;
            }
        }
        .show{
            width:100%;
            height: auto;
            font-size: 15px;
        }
    </style>
    
        <script>
        function togglePasswordVisibility(passwordFieldId) {
            const passwordField = document.getElementById(passwordFieldId);
            if (passwordField.type === "password") {
                passwordField.type = "text"; // Change type to text to show password
            } else {
                passwordField.type = "password"; // Change back to password type
            }
        }
    </script>

</head>

<body>

    <div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <img src="images/login-background.jpg" alt="">
            </div>
            <div class="back">
                <img class="backImg" src="images/signupbackground.avif" alt="">
            </div>
        </div>
        <div class="forms">
            <div class="form-content">
                <div class="login-form">
                    <div class="title">Login Form</div>
                    <form action="login_authentication.php" method="post">
                        <div class="input-boxes">
                            <div class="input-box">
                                <i class="fas fa-envelope"></i>
                                <input type="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="input-box">
                                <i class="fas fa-lock"></i>
                                <input type="password" name="pass" id="loginPassword" placeholder="Enter your password" required>
                            </div>
                            <div class="show">
                            <input type="checkbox" onclick="togglePasswordVisibility('loginPassword')"> Show Password
                            </div>
                            <!--<div class="text"><a href="#">Forgot password?</a></div>-->
                            <div class="button input-box">
                                <input type="submit" name="submitlogin" value="Sumbit">
                            </div>
                            <div class="text sign-up-text">Don't have an account? <label for="flip">Sigup now</label></div>
                        </div>
                    </form>
                </div>
                <div class="signup-form">
                    <div class="title">Signup Form</div>
                    <form action="authentication.php" method="post">
                        <div class="input-boxes">
                            <div class="input-boxxes">
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input type="text" placeholder="Name*" name="name" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" placeholder="Email*" name="email" required>
                                </div>
                            </div>
                            <div class="input-boxxes">
                                <div class="input-box">
                                    <i class="fas fa-phone"></i>
                                    <input type="number" placeholder="Mobile Number*" name="mobile" minlength="10" maxlength="10" required>
                                </div>
                                <div class="input-box">
                                <i class="fas fa-city"></i>
                                    <input type="text" placeholder="State*" name="city" required>
                                </div>
                                
                            </div>
                            <div class="input-boxxes">
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" id="regPassword" placeholder="Enter Password*" minlength="8" required>
                                     
                                </div>
                                
                                <div class="input-box">
                                    <i class="fas fa-building"></i>
                                    <input type="text" placeholder="Address*" name="address" required>
                                </div>
                            </div>
                            <div class="show">
                            <input type="checkbox" onclick="togglePasswordVisibility('regPassword')"> Show Password
                            </div>
                            <div class="button input-box">
                                <input type="submit" name="submit" value="Sumbit">
                            </div>
                            <div class="text sign-up-text">Already have an account? <label for="flip">Login now</label></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>