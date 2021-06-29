<?php
	include "includes/header.php";
	include "classes/User.php";
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password1 = $_POST['password1'];
        $password2 = $_POST['password2'];
        $user = new User($conn);
        $user->checkCreate($email, $username, $password1, $password2);
        $errors = $user->errors;
    }
?>

<div class="container main-cont right-panel-active desktop" id="container">
	<div class="form-container sign-up-container">
		<form action="signup.php" method="post" id="signup">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>

			<input type="text" class="mb-0 <?php
                    if(isset($errors['email'])) echo htmlspecialchars("border-error");
                ?>"
            name="email" id="inputEmail" placeholder="Email" value="<?php
                    if (isset($email)) echo htmlspecialchars($email);
                ?>">
            <p class="m-0 error-msg" id="errorEmail"><?php
                    if(isset($errors['email'])) echo htmlspecialchars($errors['email']);
                ?>
            </p>

			<input type="text" class="mb-0 <?php
                    if(isset($errors['username'])) echo htmlspecialchars("border-error");
                ?>"
            name="username" id="inputUsername" placeholder="Username" value="<?php
                    if (isset($username)) echo htmlspecialchars($username);
                ?>">
            <p class="m-0 error-msg" id="errorUsername"><?php
                    if(isset($errors['username'])) echo htmlspecialchars($errors['username']);
                ?>
            </p>

			<input type="password" class="mb-0 <?php
                    if(isset($errors['password1'])) echo htmlspecialchars("border-error");
                ?>"
            name="password1" id="inputPassword1" placeholder="Password" value="<?php
                    if (isset($password1)) echo htmlspecialchars($password1);
                ?>">
            <p class="m-0 error-msg" id="errorPassword1"><?php
                    if(isset($errors['password1'])) echo htmlspecialchars($errors['password1']);
                ?>
            </p>

			<input type="password" class="mb-0 <?php
                    if(isset($errors['password2'])) echo htmlspecialchars("border-error");
                ?>"
            name="password2" id="inputPassword2" placeholder="Confirm password" value="<?php
                    if (isset($password2)) echo htmlspecialchars($password2);
                ?>">
            <p class="m-0 error-msg" id="errorPassword2"><?php
                    if(isset($errors['password2'])) echo htmlspecialchars($errors['password2']);
                ?>
            </p>

			<a href="index.php"><i class="bi bi-arrow-left"></i> Back to home</a>
			<button type="submit" class="mt-1 async-task" name="signup">Sign up</button>
		</form>
	</div>

	<div class="form-container sign-in-container">
		<form action="signin.php" method="post">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" class="mb-0" name="email" placeholder="Email">
            <p class="m-0 error-msg"></p>
			<input type="password" class="mb-0" name="password" placeholder="Password">
            <p class="m-0 error-msg"></p>

			<a class="mt-0" href="index.php"><i class="bi bi-arrow-left"></i> Back to home</a>
			<button type="submit" class="async-task" name="signin">Sign in</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>Time to get back to shopping, please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Welcome To TechNow!</h1>
				<p>Fill in some personal details and start shopping with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>


</div>


<div class="container main-cont form-container sign-up-container mobile" id="container">
		<form action="signup.php" method="post" id="signupmobile">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>

			<input type="text" class="mb-0 mt-3 <?php
                    if(isset($errors['email'])) echo htmlspecialchars("border-error");
                ?>"
            name="email" id="inputEmailMobile" placeholder="Email" value="<?php
                    if (isset($email)) echo htmlspecialchars($email);
                ?>">
            <p class="m-0 error-msg" id="errorEmail"><?php
                    if(isset($errors['email'])) echo htmlspecialchars($errors['email']);
                ?>
            </p>

			<input type="text" class="mb-0 mt-3 <?php
                    if(isset($errors['username'])) echo htmlspecialchars("border-error");
                ?>"
            name="username" id="inputUsernameMobile" placeholder="Username" value="<?php
                    if (isset($username)) echo htmlspecialchars($username);
                ?>">
            <p class="m-0 error-msg" id="errorUsername"><?php
                    if(isset($errors['username'])) echo htmlspecialchars($errors['username']);
                ?>
            </p>

			<input type="password" class="mb-0 mt-3 <?php
                    if(isset($errors['password1'])) echo htmlspecialchars("border-error");
                ?>"
            name="password1" id="inputPassword1Mobile" placeholder="Password" value="<?php
                    if (isset($password1)) echo htmlspecialchars($password1);
                ?>">
            <p class="m-0 error-msg" id="errorPassword1"><?php
                    if(isset($errors['password1'])) echo htmlspecialchars($errors['password1']);
                ?>
            </p>

			<input type="password" class="mb-0 mt-3 <?php
                    if(isset($errors['password2'])) echo htmlspecialchars("border-error");
                ?>"
            name="password2" id="inputPassword2Mobile" placeholder="Confirm password" value="<?php
                    if (isset($password2)) echo htmlspecialchars($password2);
                ?>">
            <p class="m-0 error-msg" id="errorPassword2"><?php
                    if(isset($errors['password2'])) echo htmlspecialchars($errors['password2']);
                ?>
            </p>

			<a href="signin.php">Already have an account? Sign in</a>
			<a class="mt-0" href="index.php"><i class="bi bi-arrow-left"></i> Back to home</a>
			<button type="submit" class="mt-1 async-task" name="signup">Sign up</button>
		</form>
</div>

<?php
  include 'includes/footer.php';
?>