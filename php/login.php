<?php
session_start();
require( './connect-to-database.php' );

$email = trim( $_POST['email'] );
$password = trim( $_POST['password'] ) ;

$details = find_one_with_credentials( $email, $password, $dbc );

if ( $details ) {
    session_regenerate_id();
    $_SESSION['is_logged_in'] = TRUE;
    $_SESSION['user_id'] = $details['user_id'];
    header( 'Location:../views/alumini-details.php' );
} else {
    echo "invalid email or password";
    header( 'Location:../views/login.php?error=invalid emails and password' );
}

function find_one_with_credentials( $email, $password, $dbc ) {
    $get_details_for_email = "SELECT user_id,password,email
                              FROM aluminiCredentials
                              WHERE email='$email'";
    $result = mysqli_query( $dbc, $get_details_for_email );
    if ( $result ) {
        if ( mysqli_num_rows( $result ) > 0 ) {
            while ( $row = $result->fetch_assoc() ) {
                $hashed_password = $row['password'];
                $do_match = password_verify( $password, $hashed_password );
                if ( $do_match ) {
                    return $row;
                } else {
                    return null;
                }
            }
            mysqli_free_result( $result );
        }
    } else {
        header( 'Location:../views/sign-up.php' );
        return null;
    }
    ;
}
?>