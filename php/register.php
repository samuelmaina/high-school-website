<?php
require('./create-alumni-credentials.php');
$username = trim($_POST['username']) ;
$email = trim($_POST['email'] );
$password = trim($_POST['password']) ;
$password2 =trim( $_POST['password2']);

$hashed_password=password_hash($password,PASSWORD_BCRYPT);

$insertQuery = "INSERT INTO aluminiCredentials (
                username,email,password)
                VALUES('$username','$email','$hashed_password')";
 
if($aluminiCredentials_creation_success&&all_are_valid($username,$email,$password,$password2)){
if(mysqli_query ( $dbc , $insertQuery )){
    header('Location:../views/login.php');
}
else{
    header('Location:../views/sign-up.php');
}
}


if (mysqli_affected_rows( $dbc ) != 1 )
{
echo '<p>Error</p>' .mysqli_error( $dbc ) ;
mysqli_close( $dbc ) ;
header('Location:../views/sign-up.php');
}else
{
mysqli_close( $dbc ) ;
}



//validation functions

function all_are_valid($username,$email,$password,$password2){
  if(all_fields_have_values($username,$email,$password,$password2)&&is_email_valid($email)&&paswords_do_match_and_are_valid($password,$password2)){
   echo "details received successfully <br>";
   return true;
  }else{
      echo 'the input has an error';
    return false;
}
}

function all_fields_have_values($username,$email,$password,$password2){
if(empty($username)||empty($email)||empty($password)||empty($password2)
){
     echo "<br> All the fields must be filled ";
     return false;
}else{
    return true;
}
}



function is_email_valid($email)
{
if ( !filter_var( $email , FILTER_VALIDATE_EMAIL ) )
{ 
    echo "the email $email is not valid";
    return false; }else{
    return true;
}
}

function paswords_do_match_and_are_valid($password,$password2){
    //validation logic to be done later
    if($password==$password2){
        return true;
    }else{
        echo " The passwords must match<br> ";
        return false;
    }
}
?>


