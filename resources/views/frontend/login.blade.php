<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Learn2Code</title>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;600;800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500&display=swap" rel="stylesheet">
    <link rel="pr	econnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <style>
        body {

            background: url('assets/images/bglog.svg') no-repeat;
            background-attachment: fixed;
            background-size: cover;
            padding: 0;
            margin: 0;
        }

        .image2 {
            position: fixed;
            display: block;
            height: auto;
            width: 65%;
            margin-top: 55px;
            margin-left: 6px;
            margin-right: auto;
            background-color: transparent;
            border: none;
            box-shadow: none;
            outline: none;

        }
    </style>

</head>

<body>
    <header>

        <img class="image2 image-cover" src="assets/images/rocket.svg">

        <div class="log-glass">
            <h2>Login</h2>

            @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST" class="log-form">
                @csrf
                <input type="email" style="font-size: 16px" id="email" name="email" placeholder="Email"
                    required="">

                <div class="log-pass">
                    <input type="password" style="font-size: 16px" id="password" name="password" placeholder="Password"
                        required="">
                    <span class="pass-togg" onclick="togglePassword('password')">
                        <img id="imageeye" src="assets/images/hidden.png" alt="not visible eye">

                    </span>
                </div>

                <div class="remember-me">
                    <label for="remember">Remember Me</label>
                    <input type="checkbox" id="remember" name="remember">
                </div>
                <a href="{{ route('forget.password') }}" class="forgot">Forgot Password?</a>

                <p class="glad"></p>
                <br>
                <br>
                <button type="submit" style="justify-content: center;">Login</button>

                <p class="para1">Don't have an account yet? <a href="register">SignUp</a></p>


        </div>

        </form>

        <script>
            
            function togglePassword(inputId) {
                var passwordInput = document.getElementById(inputId);
                var imageeye = passwordInput.parentNode.querySelector('img');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    imageeye.src = 'assets/images/view.png';
                } else {
                    passwordInput.type = 'password';
                    imageeye.src = 'assets/images/hidden.png';
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Check if there's stored data in localStorage for email and password
                const rememberedEmail = localStorage.getItem('rememberedEmail');
                const rememberedPassword = localStorage.getItem('rememberedPassword');

                // If there is stored data, fill the input fields with the remembered values
                if (rememberedEmail) {
                    document.getElementById('email').value = rememberedEmail;
                }

                if (rememberedPassword) {
                    document.getElementById('password').value = rememberedPassword;
                }

                // Check the checkbox if data is found
                if (rememberedEmail || rememberedPassword) {
                    document.getElementById('remember').checked = true;
                }

                // Handle form submission
                document.querySelector('form').addEventListener('submit', function(event) {
                    // If "Remember Me" is checked, store the email and password in localStorage
                    if (document.getElementById('remember').checked) {
                        const email = document.getElementById('email').value;
                        const password = document.getElementById('password').value;
                        localStorage.setItem('rememberedEmail', email);
                        localStorage.setItem('rememberedPassword', password);
                    } else {
                        // If not checked, clear stored values
                        localStorage.removeItem('rememberedEmail');
                        localStorage.removeItem('rememberedPassword');
                    }
                });
            });
        </script>



</header>


</body>

</html>
=======
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<div class="row justify-content-center mt-5">
        <div class="col-lg-4">
            <div class="card">
                <div>
                    <h1 class="card-title">Login</h1>

                </div>
                <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ Session::get('error') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                   
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid">
                                <button class="btn btn-primary">Login</button>
                            </div>
                            <div class="cta">Not registered?<a href="register" style="color:#5c4ac7;"> Create an account</a></div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6">
                            <a class="btn btn-primary" href="{{ url('auth/facebook') }}"> Login with Facebook</a>
                            </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-6">
                                <a class="btn btn-primary" href="{{ route('google-auth') }}"> Login with Google</a>
                                </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
>>>>>>> e96bf7583f6ee79f606bab5df59d826b3c0f4138
