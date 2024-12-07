<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="login-form.css">
</head>
<body>
 
        <div class="nav">
            <img src="assets/logo.png" alt="">

            <ul class=nav-link>
                <li>Home</li>
                <li>About</li>
            </ul>

            <div class="lang">
                <h6>Language</h6>
                <h5>English</h5>
                <img src="assets/down-arrow.png" alt="">
            </div>

        </div>

        <div class="lower-area">
            <form method="POST" action="login-form-php.php">
            <div class="lower-form-area">
                <div class="main-form">
                    <h1>Log in to Twitter</h1>
                    <input type="text" class="input-field" placeholder="Phone,email or username" name="username">
                    <input type="password"class="input-field"  placeholder="Password"  name="user_password">

                    <div class="items-inline">
                        <button name="login" class="login-btn">Log in</button>
                        <input class="check" type="checkbox" name="remember">
                        <label for="remember">Remember me</label>

                        <a href="">Forgot password</a>

                    </div>

                </div>


            
            </div>
            </form>
            <div class="lower-form-area-bottom">
                <div class="item">
                    <h5>New to twitter ?</h5>
                    <a href="index.php">Sign up now</a>
                </div>
                
                
            </div>
            
        </div>
    
</body>
</html>