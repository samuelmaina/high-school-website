<?php
session_start();
if ( !isset( $_SESSION['is_logged_in'] ) ) {
    header( 'Location:../views/login.php' );
    exit();
}
require( '../php/connect-to-database.php' );
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update your details</title>
    <link rel="stylesheet" href="../css/form.css">
    <link rel="stylesheet" href="../css/alumni.css">
</head>
<body>
    <form action="../php/store-updated-details.php" method="POST" enctype="multipart/form-data">
        <p>Updating enables us to link alumini. <a href="#">learn more...</a></p>
        <div class="form-container">
            <?php
              $user_id=$_SESSION['user_id'];
              $fetch_user_details= "SELECT *
                              FROM aluminiDetails
                              WHERE user_id='$user_id'";

            $result = mysqli_query( $dbc, $fetch_user_details);
            if ( $result ) {
                if ( mysqli_num_rows( $result ) > 0 ) {
                    while ( $row = $result->fetch_assoc() ) {
                         $name = $row['name'];
                         $admin_no = $row['admin_no'];
                                    $house = $row['house'];
                                    $date_of_birth = $row['date_of_birth'];
                                    $current_town_of_residence = $row['current_town_of_residence'];
                                    $occupation = $row['occupation'];
                                    $place_of_work = $row['place_of_work'];
                                    $image_url =$row['image_url'];
                                    $year_of_completion=$row['year_of_completion'];
                                }
                                mysqli_free_result( $result );
                            }
                        } else {
                            echo 'unable to query the database at this time due to '.mysqli_error( $dbc );
                            return null;
                        }
                        ;
                        echo "<div class='form-container'>
                            
                               <img src='$image_url' alt='' class='profile-picture' >
                                <p> current profile picture</P>
                                <label for='file'>Select new one</label>
                                <input type='file' name='alumni_image' id='alumni_image'>
                                <label for='name'>Your official name</label>
                                <input type='hidden' name='image_url' id='name' value='$image_url'>
                                <input type='text' name='name' id='name' value='$name'><br>
                                <label for='admin_no'>School Admission number</label>
                                <input type='text' name='admin_no' id='admin_no' value='$admin_no'><br>
                                <label for='house'>The house you resided in school</label>
                                <input type='text' name='house' id='house' value='$house'><br>
                                <label for='house'>The year you completed</label>
                                 <input type='number' name='year_of_completion' id='year_of_completion' value='$year_of_completion'><br>
                                <label for='date_of_birth '>Date of Birth</label>
                                <input type='date' name='date_of_birth' id='date_of_birth'value='$date_of_birth'><br>
                                <label for='current_town_of_residence'>Current Town of Residence</label>
                                <input type='text' name='current_town_of_residence' id='current_town_of_residence' value='$current_town_of_residence'><br>
                                <label for='occupation'>Current Occupation</label>
                                <input type='text' name='occupation' id='occupation' value='$occupation'><br>
                                <label for='place_of_work '>Your Current workplace location</label>
                                <input type='text' name='place_of_work' id='place_of_work' value='$place_of_work'><br>
                                <input type='submit' class='submit' value='Update Details'>
                            </div>";
                                ?>
        </div>
        <p>Thank you for keeping  us upto date.</p>
    </form>
</body>

</html>