<?php
    include "./includes/config.php";

    if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $username = $_POST['username'];
		$password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $user = new User($conn);
        $user->checkCreate($email, $username, $password1, $password2);
        $errors = $user->errors;
    }

    include "includes/header.php";
?>

<div class="container main d-flex justify-content-center align-items-center mb-0">
    <div class="tab desktop right-panel-active" id="container">
        <div class="form-container sign-up-container">
            <form class="form-wrapper" action="signup.php" method="post" id="signup">
                <h1 class="title">Create Account</h1>
                <div class="social-container mt-4">
                    <a href="#" class="social link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social link"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social link"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span class="hint">or use your email for registration</span>

                <input type="text" class="mb-0 inp <?php
                        if(isset($errors['email'])) echo htmlspecialchars("border-error");
                    ?>"
                name="email" id="inputEmail" placeholder="Email" value="<?php
                        if (isset($email)) echo htmlspecialchars($email);
                    ?>">
                <p class="m-0 error-msg" id="errorEmail"><?php
                        if(isset($errors['email'])) echo htmlspecialchars($errors['email']);
                    ?>
                </p>

                <input type="text" class="mb-0 inp <?php
                        if(isset($errors['username'])) echo htmlspecialchars("border-error");
                    ?>"
                name="username" id="inputUsername" placeholder="Username" value="<?php
                        if (isset($username)) echo htmlspecialchars($username);
                    ?>">
                <p class="m-0 error-msg" id="errorUsername"><?php
                        if(isset($errors['username'])) echo htmlspecialchars($errors['username']);
                    ?>
                </p>

                <input type="password" class="mb-0 inp <?php
                        if(isset($errors['password1'])) echo htmlspecialchars("border-error");
                    ?>"
                name="password1" id="inputPassword1" placeholder="Password" value="<?php
                        if (isset($password1)) echo htmlspecialchars($password1);
                    ?>">
                <p class="m-0 error-msg" id="errorPassword1"><?php
                        if(isset($errors['password1'])) echo htmlspecialchars($errors['password1']);
                    ?>
                </p>

                <input type="password" class="mb-0 inp <?php
                        if(isset($errors['password2'])) echo htmlspecialchars("border-error");
                    ?>"
                name="password2" id="inputPassword2" placeholder="Confirm password" value="<?php
                        if (isset($password2)) echo htmlspecialchars($password2);
                    ?>">
                <p class="m-0 error-msg" id="errorPassword2"><?php
                        if(isset($errors['password2'])) echo htmlspecialchars($errors['password2']);
                    ?>
                </p>

                <a class="link" href="index.php"><i class="bi bi-arrow-left"></i> Back to home</a>
                <button type="submit" class="mt-1 btn-custom" name="signup">Sign up</button>
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form class="form-wrapper" action="signin.php" method="post">
                <h1 class="title">Sign in</h1>
                <div class="social-container mt-4">
                    <a href="#" class="social link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social link"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social link"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span class="hint">or use your TechNow account</span>
                <input type="text" class="mb-0 inp" name="email" placeholder="Email">
                <p class="m-0 error-msg"></p>
                <input type="password" class="mb-0 inp" name="password" placeholder="Password">
                <p class="m-0 error-msg"></p>

                <a class="link" href="index.php"><i class="bi bi-arrow-left"></i> Back to home</a>
                <button type="submit" class="btn-custom" name="signin">Sign in</button>
            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1 class="title">Welcome Back!</h1>
                    <p class="content">Time to get back to shopping, please login with your personal info</p>
                    <button class="btn-custom ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1 class="title">Welcome To TechNow!</h1>
                    <p class="content">Fill in some personal details and start shopping with us</p>
                    <button class="btn-custom ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <div class="tab mobile form-container sign-up-container" id="container">
            <form class="form-wrapper" action="signup.php" method="post" id="signupmobile">
                <h1 class="title">Create Account</h1>
                <div class="social-container mt-4">
                    <a href="#" class="social link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social link"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social link"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span class="hint">or use your email for registration</span>

                <input type="text" class="mb-0 mt-3 inp <?php
                        if(isset($errors['email'])) echo htmlspecialchars("border-error");
                    ?>"
                name="email" id="inputEmailMobile" placeholder="Email" value="<?php
                        if (isset($email)) echo htmlspecialchars($email);
                    ?>">
                <p class="m-0 error-msg" id="errorEmail"><?php
                        if(isset($errors['email'])) echo htmlspecialchars($errors['email']);
                    ?>
                </p>

                <input type="text" class="mb-0 mt-3 inp <?php
                        if(isset($errors['username'])) echo htmlspecialchars("border-error");
                    ?>"
                name="username" id="inputUsernameMobile" placeholder="Username" value="<?php
                        if (isset($username)) echo htmlspecialchars($username);
                    ?>">
                <p class="m-0 error-msg" id="errorUsername"><?php
                        if(isset($errors['username'])) echo htmlspecialchars($errors['username']);
                    ?>
                </p>

                <input type="password" class="mb-0 mt-3 inp <?php
                        if(isset($errors['password1'])) echo htmlspecialchars("border-error");
                    ?>"
                name="password1" id="inputPassword1Mobile" placeholder="Password" value="<?php
                        if (isset($password1)) echo htmlspecialchars($password1);
                    ?>">
                <p class="m-0 error-msg" id="errorPassword1"><?php
                        if(isset($errors['password1'])) echo htmlspecialchars($errors['password1']);
                    ?>
                </p>

                <input type="password" class="mb-0 mt-3 inp <?php
                        if(isset($errors['password2'])) echo htmlspecialchars("border-error");
                    ?>"
                name="password2" id="inputPassword2Mobile" placeholder="Confirm password" value="<?php
                        if (isset($password2)) echo htmlspecialchars($password2);
                    ?>">
                <p class="m-0 error-msg" id="errorPassword2"><?php
                        if(isset($errors['password2'])) echo htmlspecialchars($errors['password2']);
                    ?>
                </p>

                <a class="link" href="signin.php">Already have an account? Sign in</a>
                <a class="mt-0 link" href="index.php"><i class="bi bi-arrow-left"></i> Back to home</a>
                <button type="submit" class="mt-1 btn-custom" name="signup">Sign up</button>
            </form>
    </div>
</div>

<?php
  include 'includes/footer.php';
?>