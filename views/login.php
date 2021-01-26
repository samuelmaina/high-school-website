
    <?php
session_start();
require( '../php/connect-to-database.php' );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
  <form action="../php/login.php" method="POST">
        <p>Login to see the latest news and trends in Katchez alumni</p>
        <div class="form-container">
            <label for="email">Email</label>
            <input type="email" name='email' id='email'><br>
            <label for="password">Password</label>
            <input type="password" name='password' id='password'><br>
            <input type="submit" class="submit" value="Login">
        </div>
    </form>
</body>

</html>