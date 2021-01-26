<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <form action="../php/register.php" method="POST" >
        <p>Register with us today to link with other alumini .</p>
        <div class="form-container">
            <label for="username">Username</label>
            <input type="text" name='username' id='username'><br>
            <label for="email">Email</label>
            <input type="email" name='email' id='email'>
            <br>
            <label for="password">Password</label>
            <input type="password" name='password' id='password'><br>
            <label for="password2">Confirm Password</label>
            <input type="password" name='password2' id='password2'><br>
            <br>
            <input type="submit" class="submit" value="Sign Up">

        </div>

    </form>
</body>

</html>