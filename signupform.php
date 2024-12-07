<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="signup-form.css">
</head>
<body>
    <div class="main">
        
        <div class="signupform">
            <div class="upper">

        <form action="signup-php.php" method="POST">
                <img src="assets/logo.png" alt="">
                <button type="submit" name="cacc">Next</button>
            </div>

        
            <!-- experimental -->
            <div class="form-area">
               
                    <h1>Create your account</h1>
                    <div class="input-container" id="name-container">
                        <input type="text" placeholder="Name" class="input-field" name="user_name">
                    </div>
                    <div class="input-container" id="email-container" style="display: none;">
                        <input type="email" placeholder="Email" class="input-field" name="user_email">
                    </div>
                    <div class="input-container">
                        <input type="password" placeholder="Password" class="input-field" name="user_password">
                    </div>
                    <br>
                    <a href="#" id="toggle-link">Use email instead</a>

                </form>
            </div>

            <!--  -->
        
            

        </div>
            
    </div>

    <script>
        document.getElementById('toggle-link').addEventListener('click', function(event) {
            event.preventDefault();
            var nameContainer = document.getElementById('name-container');
            var emailContainer = document.getElementById('email-container');
            
            if (nameContainer.style.display === 'none') {
                nameContainer.style.display = 'block';
                emailContainer.style.display = 'none';
                this.textContent = 'Use email instead';
            } else {
                nameContainer.style.display = 'none';
                emailContainer.style.display = 'block';
                this.textContent = 'Use name instead';
            }
        });

    </script>
</body>
</html>


<!-- <div class="upper">
                <img src="assets/logo.png" alt="">
                <button>Next</button>
            </div>

            <h2>Create your account</h2>
            <div class="input-container">
                <input type="text" placeholder="Name" class="input-field">
            </div>
            <div class="input-container">
                <input type="text" placeholder="Phone" class="input-field">
            </div> -->