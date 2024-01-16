<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Learn2Code</title>
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

            background: url('assets/images/bgsign.svg') no-repeat;
            background-attachment: fixed;
            background-size: cover;
            padding: 0;
            margin: 0;
        }

        .image1 {
            display: block;
            height: auto;
            width: 40%;
            margin-top: 215px;
            margin-left: auto;
            margin-right: 66px;
            background-color: transparent;
            border: none;
            box-shadow: none;
            outline: none;

        }
    </style>

</head>

<body>
    <header>

        <img class="image1 image-cover" src="assets/images/Astro.svg">


        <div class="glass1">
            <h2>Sign Up</h2>

            @if (Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
            @endif

            <form action="{{ route('register') }}" method="POST" class="signup-form">
                @csrf
                <br>

                <input type="email" style="font-size: 16px" id="email/phone" name="email"
                    placeholder="Email"required="" autocomplete="email">
                <input type="text" style="font-size: 16px" id="username" name="username" placeholder="User Name"
                    required="" autocomplete="nickname">
                <input type="text" style="font-size: 16px" id="firstname" name="fname" placeholder="First Name"
                    required="" autocomplete="given-name">
                <input type="text" style="font-size: 16px" id="lastname" name="lname" placeholder="Last Name"
                    required="" autocomplete="family-name">

                <div class="selectYear-container">
                    <div class="dropdown">
                        <select name="year" id="yearDown" required="" autocomplete="off">
                            <option value="">---Select Year---</option>
                            <option value="1st Year">1st Year</option>
                            <option value="2nd Year">2nd Year</option>
                            <option value="3rd Year">3rd Year</option>
                            <option value="4th Year">4th Year</option>
                        </select>
                    </div>
                </div>

                {{-- <div class="password-container">    
        
    <input type="password" id="password" name="password" placeholder="Password" required>
    <span class="password-toggle" onclick="togglePassword('password')">
    	<img id="eyeImage1" src="assets/images/hidden.png" alt="not visible eye"> 	
    </span>
        </div>

    <div class="password-container"> 
        
    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
     <span class="password-toggle" onclick="togglePassword('confirmPassword')">
     	<img id="eyeImage2" src="assets/images/hidden.png" alt="not visible eye">
     </span>
        </div>
        <br>
    <button type="submit" id="btnSubmit" style="justify-content: center;">Sign Up</button> --}}

                <div class="password-container">
                    <input type="password" style="font-size: 16px" id="password" name="password" placeholder="Password"
                        required="" autocomplete="current-password">
                    <span class="password-toggle" onclick="togglePassword('password')">
                        <img id="eyeImage1" src="assets/images/hidden.png" alt="not visible eye">
                    </span>
                </div>

                <div class="password-container">
                    <input type="password" style="font-size: 16px" id="confirmPassword" name="confirmPassword"
                        placeholder="Confirm Password" required oninput="checkPasswordMatch()" autocomplete="new-password">
                    <span class="password-toggle" onclick="togglePassword('confirmPassword')">
                        <img id="eyeImage2" src="assets/images/hidden.png" alt="not visible eye">
                    </span>
                </div>

                <div id="passwordMismatch" style="display: none; color: rgb(129, 0, 0); font-size:18px; position:inherit;bottom:10px;">
                    Confirm password does not match.
                </div>
                
                <br>
                <button type="submit" style="justify-content: center; " onclick="return validatePasswords()">Sign
                    Up</button>

                <p class="para-2">Already have an account? <a href="login">Login Here</a></p>


        </div>
        </form>


        {{-- <script> 


    function togglePassword(inputId) {
        var passwordInput = document.getElementById(inputId);
        var eyeImage = passwordInput.parentNode.querySelector('img');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeImage.src = 'assets/images/view.png';
        } else {
            passwordInput.type = 'password';
            eyeImage.src = 'assets/images/hidden.png';
        }
    }

</script> --}}

        <script>
            function togglePassword(inputId) {
                var passwordInput = document.getElementById(inputId);
                var eyeImage = passwordInput.parentNode.querySelector('img');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    eyeImage.src = 'assets/images/view.png';
                } else {
                    passwordInput.type = 'password';
                    eyeImage.src = 'assets/images/hidden.png';
                }
            }

            function checkPasswordMatch() {
                var password = document.getElementById('password').value;
                var confirmPassword = document.getElementById('confirmPassword').value;
                var mismatchDiv = document.getElementById('passwordMismatch');

                if (password !== confirmPassword) {
                    mismatchDiv.style.display = 'block';
                } else {
                    mismatchDiv.style.display = 'none';
                }
            }

            function validatePasswords() {
                var password = document.getElementById('password').value;
                var confirmPassword = document.getElementById('confirmPassword').value;

                if (password !== confirmPassword) {
                    document.getElementById('passwordMismatch').style.display = 'block';
                    return false;
                }

                return true;
            }
        </script>

    </header>


</body>

</html>
