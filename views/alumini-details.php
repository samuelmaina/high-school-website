<?php
session_start();
require('../php/connect-to-database.php');
if ( !isset( $_SESSION['is_logged_in'] ) ) {
  $page_title="Alumni : Kiambu High School";
    include('./includes/upper-head.php') ;
    echo "<link rel='stylesheet' href='../css/alumni.css'>";
    include('./includes/header.php') ;
    echo "<div class='main'>
        <p>You must be a registered member to see the alumini page. Please Sign Up or login to continue
        </p>
        <div class='prompt'>
            <a href='../views/sign-up.php' class='sign-up'>Sign Up</a>
            <a href='../views/login.php' class='login'>Login</a>
        </div>
    </div>";
include('./includes/footer.php') ;
}else{
    $page_title="Alumni : Kiambu High School";
include('./includes/upper-head.php') ;
echo "<link rel='stylesheet' href='../css/alumni-details.css'>";
include('./includes/header.php') ;

  echo "  <div class='main'>
        <div class='prompt'>";
            $user_id = $_SESSION['user_id'];
            $get_details_for_user_id = "SELECT *
                    FROM aluminiDetails
                    WHERE user_id='$user_id'";

            $details = mysqli_query( $dbc, $get_details_for_user_id );
            if ( $details ) {
                if ( mysqli_num_rows( $details ) > 0 ) {
                    echo" <a href = './update-details.php' class = 'insert-button'>Update Details</a>";
                    mysqli_free_result( $details );
                }else{
                    echo" <a href = './insert-details.php' class = 'insert-button'>Insert Details</a>";
                }
            } else {
                echo" <a href = './insert-details.php' class = 'insert-button'>Insert Details</a>"; 
            }

          
         echo " <form action='../php/logout.php' method='POST'>
                <input type='submit' class='login'  value='Logout'>
            </form>
        </div>
        <div class='alumini'>";
                $user_id = $_SESSION['user_id'];
                $get_all_alumni = 'SELECT * FROM aluminiDetails';

                $result = mysqli_query( $dbc, $get_all_alumni );
                if ( $result ) {
                    if ( mysqli_num_rows( $result ) > 0 ) {
                        while ( $row = $result->fetch_assoc() ) {
                            $name = $row['name'];
                            $admin_no = $row['admin_no'];
                            $image_url=$row['image_url'];
                            $year_of_completion=$row['year_of_completion'];

                            echo" <div class='aluminus'>
                                        <img src='$image_url' alt=''>
                                      <h3> Name:</h3> <p>$name</p>
                                      <h3> Admission Number:</h3>  <p>$admin_no</p>
                                      <h3> Compeleted in the Year:</h3>  <p>$year_of_completion</p>
                                    </div>";
                        }
                        mysqli_free_result( $result );
                    }
                } else {

                echo "<p>Currently we have no alumni</p>";
                }
                ;

                ?>

        </div>
    </div>
    
<?php
include( './includes/footer.php' ) ;


}
    

 