<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Registration</title>

    <!-- Font Icon -->
    

    <!-- Main css -->
    <link rel="stylesheet" href="css/register.css">
</head>
<body>

    <div class="main">
    
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
            <div class="particles"></div>
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="register.php">
                        <?php include('errors.php'); ?>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" autocomplete="off" name="first_name" id="first_name" required="_required" placeholder="First Name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" autocomplete="off" name="last_name" id="last_name" required="_required" placeholder="Last Name"/>
                            </div>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" autocomplete="off" name="username" id="username" required="_required" placeholder="username"/>
                            </div>
                          
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" autocomplete="off" name="email" id="email" required="_required" placeholder="Your Email"/>
                            </div>
                         
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" autocomplete="off" name="password_1" id="password_1"required="_required" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" autocomplete="off" name="password_2" id="password_2"required="_required" placeholder="Repeat your password"/>
                            </div>
                         <div class="form-group form-button">
                            <input type="submit" name="reg_user" id="reg_user" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/tcet.png" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
       
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>