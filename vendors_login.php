<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book store</title>
        <link rel = "stylesheet" href = "register_style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body id="vendors">

      <header><a class = "a" href = index.html>
         <i class="fa fa-arrow-circle-o-left"></i>
         <p>Back</p>
      </a></header>

            <main class="vendors">
                <div class="wrapper">
                    <div class="title-text">
                       <div class="title login">
                          Login Form
                       </div>
                       <div class="title signup">
                          Signup Form
                       </div>
                    </div>
                    <div class="form-container">
                       <div class="slide-controls">
                          <input type="radio" name="slide" id="login" checked>
                          <input type="radio" name="slide" id="signup">
                          <label for="login" class="slide login">Login</label>
                          <label for="signup" class="slide signup">Signup</label>
                          <div class="slider-tab"></div>
                       </div>
                       <div class="form-inner">
                          <form action="vendor_validate.php" method="post" class="login">
                             <div class="field">
                                <input type="text" name="username" placeholder="Username" required>
                             </div>
                             <div class="field">
                                <input type="password" name="password" placeholder="Password" required>
                             </div>
                             <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="signin" value="Signin">
                             </div>
                          </form>
                          <form action="vendor_register.php" method="post" class="signup">
                           <div class="field">
                              <input type="text" name="username" placeholder="User name" required>
                           </div>
                           <div class="field">
                            <input type="text" name="businessname" placeholder="Business name" required>
                           </div>
                           <div class="field">
                            <input type="text" name="address" placeholder="Business Address" required>
                           </div>
                           <div class="field">
                              <input type="password" name="password" placeholder="Password" required>
                           </div>
                           <div class="field">
                            <input type="file" name="file" required>
                           </div>
                             <div class="field btn">
                                <div class="btn-layer"></div>
                                <input type="submit" name="signup" value="Signup">
                             </div>
                          </form>
                       </div>
                    </div>
                 </div>
            </main>

            <footer>
                <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                    <!-- Copyright -->
                    <div class="text-white mb-3 mb-md-0">
                      Copyright © 2020. All rights reserved.
                    </div>
                    <!-- Copyright -->
               
                  </div>
            </footer>

            <script>
                const loginText = document.querySelector(".title-text .login");
                const loginForm = document.querySelector("form.login");
                const loginBtn = document.querySelector("label.login");
                const signupBtn = document.querySelector("label.signup");
                const signupLink = document.querySelector("form .signup-link a");
                signupBtn.onclick = (()=>{
                  loginForm.style.marginLeft = "-50%";
                  loginText.style.marginLeft = "-50%";
                });
                loginBtn.onclick = (()=>{
                  loginForm.style.marginLeft = "0%";
                  loginText.style.marginLeft = "0%";
                });
                signupLink.onclick = (()=>{
                  signupBtn.click();
                  return false;
                });
             </script>
    </body>
</html>

<?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidUsername") {
            echo "<p>Invalid Username</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "usernameExisted") {
            echo "<p>Username already exsits</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidPassword") {
            echo "<p>Invalid Password</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidBusinessName") {
            echo "<p>Invalid Business Name</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "invalidAddress") {
            echo "<p>Invalid Address</p>";
        }
    }
    if (isset($_GET["error"])) {
        if ($_GET["error"] == "created") {
            echo '<p>Register succesfully, go to Login page to login!</p>';
        }
    }
?>