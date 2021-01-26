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
    <title>Insert Details</title>
    <link rel="stylesheet" href="../css/form.css">
</head>
    <form action="../php/store_details.php" method="POST" enctype="multipart/form-data">
        <div class="form-container">
            <label for="file">Select your profile picture </label>
            <input type="file" name="alumni_image" id="alumni_image">
            <label for="name">Your official name</label>
            <input type="text" name='name' id='name'><br>
            <label for="admin_no">School Admission number</label>
            <input type="text" name='admin_no' id='admin_no'><br>
            <label for='house'>The house you resided in school</label>
            <input type="text" name='house' id='house'><br>
            <label for='house'>The year you completed</label>
            <input type="number" name='year_of_completion' id='year_of_completion'><br>
            <label for="date_of_birth ">Date of Birth</label>
            <input type="date" name='date_of_birth' id='date_of_birth'><br>
            <label for="current_town_of_residence">Current Town of Residence</label>
            <input type="text" name='current_town_of_residence' id='current_town_of_residence'><br>
            <label for="occupation">Current Occupation</label>
            <input type="text" name='occupation' id='occupation'><br>
            <label for="place_of_work ">Your Current workplace location</label>
            <input type="text" name='place_of_work' id='place_of_work'><br>
            <input type="submit" class="submit" value="Submit Details">
        </div>
    </form>
</body>