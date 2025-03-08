<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Library Web</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&family=Roboto:wght@400;500&display=swap">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <!-- Main container for centering the login card on the screen -->
    <div class="container">
        <!-- Login card containing both the image and the form -->
        <div class="login-card">
            <!-- Left side of the card containing the decorative image -->
            <div class="card-left">
                <div class="image-cover">
                    <img src="{{ asset('assets/img/hero-bg.jpg') }}" alt="Decorative Furniture Image">
                </div>
            </div>
            <!-- Right side of the card containing the login form -->
            <div class="card-right">
                <!-- Title of the login form -->
                <h1 class="title">Library</h1>
                <!-- Subtitle welcoming the user -->
                <h2 class="welcome">Welcome to Library Web</h2>
                <!-- Form for user input -->
                <form action="{{ route('login.process') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Input group for email -->
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email">
                    </div>
                    <!-- Input group for password -->
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password">
                    </div>
                    <!-- Actions section containing the Sign In button and forgot password link -->
                    <div class="actions">
                        <button type="submit" class="btn">Sign in</button>
                        <a href="{{ route('register') }}" class="forgot-password">Create New Account?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    @include('sweetalert::alert')
</body>

</html>
