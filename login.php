<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Font Icon -->
    

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
    <div class="container">
        <div class="particles"></div> 

        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="images/tcet.png" alt="sing up image"></figure>
                
            </div>

            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <form method="POST" class="register-form" action="login.php" id="login-form">
                    <?php include('errors.php'); ?>

                    <div class="form-group">
                        <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" autocomplete="off" name="username" id="username" required="_required" placeholder="Username"/>
                    </div>

                    <div class="form-group">
                        <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" autocomplete="off" name="password" id="password" required="_required" placeholder="Password" color="red"/>
                    </div>
                    
                    <div class="form-group form-button">
                        <input type="submit" name="submit" id="submit" class="form-submit" value="Log in"/>
                    </div>

                    <div class="register">
  <a href="register.php" class="signup-image-link">Admin registration</a>
</div>
                    
                </form>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>