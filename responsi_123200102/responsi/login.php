<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Page</title>
</head>

<body>
    <div class="page">
        <div class="container">
            <div class="left">
                <div class="login">Login</div>
                <div class="eula">By logging in you agree to the ridiculously long terms that you didn't bother to read</div>
            </div>
            <div class="right">
                <form action="ceklogin.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <hr>
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <hr>
                    <input type="submit" id="submit" value="LOGIN" name="submit">
                </form>
            </div>
        </div>
    </div>
</body>

</html>